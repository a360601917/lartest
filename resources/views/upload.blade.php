<form method="post" enctype="multipart/form-data" action="<?=route('test.store')?>">    
  {{ csrf_field() }}
    <input type="file" name="picture">
    <button type="submit"> 提交 </button>
    
</form>