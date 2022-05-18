$(function(){
    console.log("Jquery ok");
    $("#task-result").hide();
    $("#search").keyup(function(){
        if($('#search').val()){
            let search =$("#search").val();
            $.ajax({
                url: 'recibos-search.php',
                type: 'POST',
                data: {search},
                success: function(response) {
                    let tasks = JSON.parse(response);
                    let template='';
                    tasks.forEach(task => {
                        template += `<li>
                        ${task.serviceNum}
                        </li>`
                    });
                    $('#container').html(template);
                    $("#task-result").show();
                }
            });
        }
    });
    $('#recibo-form').submit(function(e){
        e.preventDefaul();
    });
});