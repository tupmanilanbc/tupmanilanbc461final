@extend('layouts/admin', ['title' => 'Upload a file'])


<h3>Upload documents</h3>
<hr>
<a href="/admin/docs" class="btn btn-sm btn-primary">back to <b>Documents</b></a>
<hr>
<p class="help-block">
    Tip: 10 Files can be uploaded at the same time. <br>
    and a maximum of 20MB of size per upload.
</p>
<div class="row">
    <div class="col-md-6">
        <div class="well">
            <label>Category</label>
            <select id="category" class="form-control">
                <option value="Administrator">Administrator</option>
            </select>
            <br>

            <label>Additional Notes...</label>
            <textarea name="notes" id="notes" class="form-control"></textarea>

            <div class="uploader">
                <label for="uploader" class="choose-files">
                    <img class="loading hidden" src="/cms/img/sm-loading.gif">
                    <i class="fa fa-file"></i> <span class="file-label">No files selected.</span>
                </label>
                <input type="file" multiple id="uploader">
                <i id="result"></i>
            </div>
            <br>
        </div>
    </div>
</div>
<hr>

<script>
    var fileLabel = document.querySelector('.file-label'),
        defaultLabel = document.querySelector('.choose-files').innerHTML,
        uploader = document.querySelector('#uploader'),
        result = document.querySelector('#result'),
        loading = document.querySelector('.loading'),
        request  = new XMLHttpRequest(),
        data     = new FormData;

    uploader.onchange = function () {
        if (uploader.files[0] != undefined) {
            if (uploader.files.length > 10) {
                return result.innerHTML = "<i class='text-error'>More than 10 files were selected.</i>";
            }
            fileLabel.innerHTML = "(" + uploader.files.length + ") Files Selected.";
            loading.className = "loading";
            for(var i = 0; i < uploader.files.length; i++) {
                data.append('files[]', uploader.files[i]);
            }
            data.append('category', document.querySelector('#category').value);
            data.append('notes', document.querySelector('#notes').value);
            request.open('POST', '/admin/docs/store', true);
            request.send(data);
            request.onload = function (e) {
                result.innerHTML = e.target.responseText;
                loading.className = "loading hidden";
                fileLabel.innerHTML = defaultLabel;
            }
        } else {
            return false;
        }
    }
</script>


@stop()