<?php

/**
 * Default controller
 * Class HomeController
 */

use App\Models\Media;
use App\Models\User;
use App\Models\Log;
use Kernel\Format;
class DocsCtrl extends ClientAuth
{
    /**
     * @return View
     */
    public function index()
    {
        return View::render('app/docs/index');
    }


    /**
     * @return View
     */
    public function upload()
    {
        return View::render('app/docs/upload');
    }


    /**
     * Media Index
     *
     * @return view
     */
    public function fetch()
    {
        $files = Media::order('id', 'desc')->get();

        print("
        <table class='table table-responsive' id='table'>
            <thead>
            <tr>
                <td>ID</td>
                <td>File Name</td>
                <td>Category</td>
                <td>Notes</td>
                <td>Extension</td>
                <td>File Size</td>
                <td>Date</td>
                <td>Manage</td>
            </tr>
            </thead>
            <tbody>
        ");

        foreach ($files as $media):
            $date = date('F j, Y', $media->created) . ' at ' . date('h:i A', $media->created);

            if ($media->extension == 'jpg' ||
                $media->extension == 'png' ||
                $media->extension == 'jpeg'||
                $media->extension == 'bmp')
            {
                $preview = "<img src='/uploads/media/{$media->name}' width='50'>";
            } else {
                $preview = "";
            }

            print("
            <tr>
                <td>$media->id</td>
                <td style='padding:3px'>
                    {$preview}&nbsp;
                    <a href='/uploads/media/$media->name' target='_blank'>
                        " . Format::fold($media->name, 40) . "
                    </a>
                </td>
                <td>$media->category</td>
                <td>$media->notes</td>
                <td>(.$media->extension)</td>
                <td>($media->size Bytes)</td>
                <td>$date</td>
                <td class='table-manage'>
                    <a class='action btn-download' href='".route('app.docs.download',$media->id)."'></a>
                    <span class='action btn-erase' onclick='cms.destroy(\"/app/docs/destroy/$media->id\")'></span>
                </td>
            </tr>");
        endforeach;

        print ("</tbody></table>");
    }



    /**
     * @return View
     */
    public function store()
    {
        $message = null;
        $files = $_FILES['files'];

        for ($i = 0; $i < count($files['name']); $i++) {
            if (file_exists("uploads/media/{$files['name'][$i]}")) {
                $filename = pathinfo($files['name'][$i], PATHINFO_BASENAME) . '-001.' . pathinfo($files['name'][$i], PATHINFO_EXTENSION);
            } else {
                $filename = $files['name'][$i];
            }

            if (move_uploaded_file($files['tmp_name'][$i], "uploads/media/{$filename}")) {
                Media::insert([
                    'category'   => $_POST['category'],
                    'notes'      => $_POST['notes'],
                    'name'       => $filename,
                    'extension'  => pathinfo($files['name'][$i], PATHINFO_EXTENSION),
                    'mime'       => $files['type'][$i],
                    'size'       => $files['size'][$i],
                    'user_id'    => Session::get('client')->id,
                    'created'    => time(),
                    'updated'    => time(),
                ]);

                $message = "Upload complete.";
            } else {
                $message = "Upload Failure.";
            }
        }

        if ($message == 'Upload complete.') {
            Log::insert([
                'user_id' => Session::get('client')->id,
                'type' => 'Docs',
                'description' => 'Documents',
                'content' => 'uploaded file(s) to docs.',
                'created' => time(),
                'updated' => time(),
            ]);
        }

        return print ($message);
    }


    /**
     * Destroy a resource
     * @param $id
     * @return string
     */
    public function destroy($id)
    {
        $file = Media::find($id);


        if(file_exists('uploads/media/' . $file->name)) {
            unlink('uploads/media/' . $file->name);
        }

        $file->delete();

        Log::insert([
            'user_id' => Session::get('client')->id,
            'type' => 'Docs',
            'description' => 'Documents',
            'content' => 'erased a file.',
            'created' => time(),
            'updated' => time(),
        ]);

        echo 1;
    }





    /**
     * @param $id
     * @return string
     */
    public function download($id)
    {
        $file = Media::find($id);
        return download_file('uploads/media/' . $file->name, $file->mime, $file->name);
    }
}
