$(function()
{
    if($('#drophere').length > 0)
    {
    let csrfToken = $('meta[name="csrf-token"]').attr('content');
    let uniqueSecret = $('input[name="uniqueSecret"]').attr('value');
        console.log(uniqueSecret)
    let myDropzone = new Dropzone('#drophere' , {
        url: '/ad/images/upload',

        params: {
            _token: csrfToken,
            uniqueSecret: uniqueSecret,
        },

        addRemoveLinks: true,

        init: function() {
            $.ajax({
                type: 'GET',
                url: '/ad/images/old',
                data: {
                    uniqueSecret: uniqueSecret
                },
                dataType: 'json'
            }).done(function(data){
                console.log(data)
                $.each(data, function(key,value){
                    let file = {
                        serverId: value.id,
                        size: value.size
                    };

                    myDropzone.options.addedfile.call(myDropzone, file);
                    myDropzone.options.thumbnail.call(myDropzone, file, value.src);
                    myDropzone.emit('complete',file)
                });
            });
        }
    });

    myDropzone.on("success", function(file,response){


        file.serverId = response.id;

    });

    myDropzone.on("removedfile", function(file){


        $.ajax({

            type : 'DELETE',
            url : '/ad/images/remove',
            data : {
                _token : csrfToken,
                id : file.serverId,
                uniqueSecret: uniqueSecret
            },

            dataType: 'json'
        });

    });

    }
});
