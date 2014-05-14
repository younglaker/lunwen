<div id="main">
    <h2 class="title-h2">上传论文</h2>
    <form class="upload-block" action="<?php echo base_url();?>index.php/api/do_upload" method="post" enctype="multipart/form-data">
        <p>
            <label for="upload-title">标题：</label>
            <input type="text" name="title" id="upload-titl" class="input-ctx">
        </p>
        <?php if($role > 1) {?>
        <p>
            <label for="upload-title" style="color:red">*编号（多个编号用分号隔开）：</label>
            <input type="text" name="number" value="" id="upload-titl" class="input-ctx">
        </p>
        <?php }?>
        <p>
            <label for="upload-author">作者：</label>
            <input type="text" name="author" id="upload-author" class="input-ctx">
        </p>
        <p>
            <label for="upload-teacher">导师：</label>
            <input type="text" name="teacher" id="upload-teacher" class="input-ctx">
        </p>
        <p>
            <label for="upload-school">学校：</label>
            <input type="text" name="school" id="upload-school" class="input-ctx">
        </p>
        <p>
            <label for="upload-college">学院：</label>
            <input type="text" name="college" id="upload-college" class="input-ctx">
        </p>
        <p>
            <label for="upload-career">专业：</label>
            <input type="text" name="career" id="upload-career" class="input-ctx">
        </p>
        <p>
            <label for="upload-catage">研究方向：</label>
            <input type="text" name="catage" id="upload-catage" class="input-ctx">
        </p>
        <p>
            <label for="">论文摘要：</label>
            <textarea name="description" id="" cols="100" rows="10"></textarea>
        </p>
        <p>
            <label for="">上传论文和附件：</label>
            <input type="file" name="attachment">
        </p>
        <p>
            <input type="submit" value="上传论文" name="submit" class="btn-blue-lg">
        </p>
    </form>
</div>
