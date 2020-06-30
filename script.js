$(function(){
  $('.btn').click(add_task);
  $('.list').on('click','.del_btn', del_task)
})
function add_task(){
  let text = $('.field').val();
  if(text){
    console.log(text);
    $.post("add_task.php",{text:text},function(data){
        $('.field').val('');
	$('.list').prepend('<li><p>'+data.task+'</p><button type="button" class="del_btn" data="'+data.id+'">удалить</button></li>')
    })
  }
}
function del_task(){
  let el = $(this);
  let id = el.attr('data');
  if(id){
    console.log(id);
    $.post("del.php",{id:id},function(data){
      if(data.sts == 1){
        el.parent('li').remove();
      }
    })
  }
}
