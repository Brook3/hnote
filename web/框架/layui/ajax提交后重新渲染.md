# 1. ajax提交后重新渲染
```js
    layui.use('form', function() {

        // 处理excel
        function exec_excel(){
            var form_data = new FormData($("#form_check")[0]);
            $.ajax({
                url: 'check',
                type: 'POST',
                data: form_data,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (e) {
                    e = JSON.parse(e);
                    if (e.res) {
                    } else {
                        alert(e.msg);
                    }
                }
            });
        }

        // 导入excel
        $(".excel_import").click(function() {
            var form_data = new FormData($("#form_import")[0]);
            $.ajax({
                url: 'excel_import',
                type: 'POST',
                data:form_data,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function (e) {
                    e = JSON.parse(e);// js处理php中的json_encode数据
                    if(e.res){
//                        alert(e.msg);
                        // 上传成功，这里可以进行选择
                        var nav_str = '<div class="layui-form-item">' +
                            '<label class="layui-form-label">需要操作的工作区</label>' +
                            '<div class="layui-input-block">';
                        $.each(e.data.all_sheet_name, function(m,n){
                            nav_str += '<input type="checkbox" name="sheet' + m + '" title="' + n + '">';
                        });
                        nav_str += '</div>' +
                            '</div>';
                        $('#form_check').prepend(nav_str);
                        // 处理excel
                        $('#exec_div').addClass("layui-show");
                        $('.exec_excel').click(function(){exec_excel()});// ajax提交后增加click方法
                        form.render();// 这里进行重新渲染
                    }else{
                        alert(e.msg);
                    }
                }
            });
        });
    });
```
