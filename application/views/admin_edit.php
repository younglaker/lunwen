<div id="main">
    <h2 class="title-h2">编辑论文</h2>
    <form class="upload-block" action="<?php echo base_url();?>index.php/api/do_update/<?php echo $paper[0]['id'];?>" method="post" enctype="multipart/form-data">
        
       <p>
            <label for="upload-title">标题：</label>
            <input type="text" name="title" value="<?php echo $paper[0]['title'];?>" id="upload-titl" class="input-ctx">
        </p>
        
        <p>
            <label for="upload-title" style="color:red">*编号：</label>
            <input type="text" name="number" value="<?php echo $paper[0]['number'];?>" id="upload-titl" class="input-ctx">
        </p>

        <p>
            <label for="upload-author">作者：</label>
            <input type="text" name="author" value ="<?php echo $paper[0]['author'];?>" id="upload-author" class="input-ctx">
        </p>
        <p>
            <label for="upload-teacher">导师：</label>
            <input type="text" name="teacher" id="upload-teacher" value ="<?php echo $paper[0]['leader'];?>" class="input-ctx">
        </p>
        <p>
            <label for="upload-school">学校：</label>
            <input type="text" name="school" id="upload-school" value ="<?php echo $paper[0]['university'];?>" class="input-ctx">
        </p>
        <p>
            <label for="upload-college">学院：</label>
            <input type="text" name="college" id="upload-college" value ="<?php echo $paper[0]['college'];?>" class="input-ctx">
        </p>
        <p>
            <label for="upload-career">专业：</label>
            <input type="text" name="career" id="upload-career" value ="<?php echo $paper[0]['specialty'];?>"class="input-ctx">
        </p>
        <p>
            <label for="upload-catage">研究方向：</label>
            <input type="text" name="catage" id="upload-catage" value ="<?php echo $paper[0]['research'];?>" class="input-ctx">
        </p>
        <p>
            <label for="">论文简介：</label>
            <textarea name="description" id="" cols="100" rows="10"><?php echo $paper[0]['summary'];?>"</textarea>
        </p>
        <p>
            <label for="">上传论文和附件：</label>
            <input type="file" name="attachment">
        </p>
        <p>
            <input type="radio" name="publish"  value="0">拒绝
            <input type="radio" name="publish" checked = "true" value="1">发布
        </p>
        <p>
            <input type="submit" value="确定" class="btn-blue-lg">
        </p>
    </form>
</div>
