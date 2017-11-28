  var loadFile = function(event) {
	$('.popupupload .panel-upload .image img').attr('src',URL.createObjectURL(event.target.files[0]));
	$('.popupupload .panel-upload .image label').fadeOut('slow',function(){
		$('.popupupload .panel-upload .image img').fadeIn('slow');
	});
	
  };
function retryImageUpload(){
    $('.panel-upload .notice').fadeOut('slow',function(){
        $('.panel-upload .mainform').fadeIn('slow');
    });
    
}
$(document).ready(function(){
    var cancelcomment = '';
    $(document).delegate('.formeditcomment','submit',function(){
        var url = $('base').attr('href');
        var h = $(this);
        var cancel = $(this).parent().find('font').html();
        var edit = '&nbsp; &nbsp;<span class="editcomment fa fa-pencil"></span>&nbsp; '+
                 '<span class="deletecomment fa fa-trash-o" ></span>';
        var html = 'a';
        //$(this).parent().find('font').html('Mengirim komentar....');
        $.ajax({
        url: url+'komentar/editkomentar',
        type: "POST",
        timeout: 60000,
        data: h.serialize(),
        dataType: 'json',
        success: function(data){
            html = '<li idcomment="'+data.foto[0].idKomentar+'"><a href="'+url+'profil/lihatprofil/'+data.foto[0].member+'">' + data.foto[0].member + '</a><font>'+ data.foto[0].isiKomentar + '</font>' + edit +'</li>';
            //alert(h.html());
            //alert(html);
            h.parent().html(html);
        },error:function(){
            html = '<font style="display:none">'+cancel+'</font>something wrong, check your connection'+edit;
            h.parent().html(cancelcomment);
        }
        });
        //alert(html)
        
        return false;
    });
    $(document).delegate('.deletecomment','click',function(){
        var id = $('.detail').attr('idfoto');
        var c = confirm("Apahakah anda yakin menghapus ? ");
        if(!c){
            return false;
        }
        var idFoto = $(this).parent().attr('idcomment');
        var url = $('base').attr('href');
        var h = $(this);
        $.ajax({
        url: url+'komentar/hapuskomentar/'+idFoto,
        timeout: 60000,
        success: function(data){
            if(data==1){
                h.parent().fadeOut('slow');
                var count = $('.detail .panel .comments').attr('count');
                --count;
                $('.detail .panel .comments').html(count);
                $('.detail .panel .comments').attr('count',count);
                $('#comment-'+id).html(count);
            }
        },error:function(){
            alert('something error');
        }
        });
        return false;
    });
    $(document).delegate('.cancelcomment','click',function(){
        $(this).parent().parent().html(cancelcomment);
        return false;
    });
    $(document).delegate(".editcomment", "click", function() {
       cancelcomment = $(this).parent().html();
       var val = $(this).parent().find('font').html();
       var idFoto = $(this).parent().attr('idcomment');
       $(this).parent().html('<form method="post" id="c'+idFoto+'" class="formeditcomment"><input name="idcomment" type="hidden" value="' + idFoto + '" /><input value="'+val+'" name="comment" /><button class="small">Save</button><button class="small cancel cancelcomment">Cancel</button>');
    });
    $('.detail .panel .delete').on('click',function(){
        var c = confirm("Apahakah anda yakin menghapus ? ");
        var url = $('base').attr('href');
        if(c){
            window.location = url+'foto/hapusfoto/'+$(this).attr('idfoto');
        }
    })
    $('.detail .panel .edit').on('click',function(){
        $('.detail').fadeOut();
        $('.popeditfoto').fadeIn();
    })
    $('.editprofile').on('click',function(){
        $('.popedit').fadeIn('slow');
        return false;
    })
  $('.detail .commend form').submit(function(){
      var id = $('.detail').attr('idfoto');
      var url = $('base').attr('href');
      $.ajax({
        url: url+'komentar/tambahkomentar/'+id,
        type: "POST",
        timeout: 60000,
        data: $('.detail .commend form').serialize(),
        async: false,
        success: function(data){
            var count = $('.detail .panel .comments').attr('count');
            ++count;
            var html = '<li><a href="'+url+'profil/lihatprofil/'+$('#username').attr('content')+'">'+$('#username').attr('content')+'</a>'+$('.detail .commend form input').val()+'</li>';
            $('.detail .panel .comment').append(html);
            $('.detail .commend form input').val('');
            $('.detail .panel .comments').html(count);
            $('.detail .panel .comments').attr('count',count);
            $('#comment-'+id).html(count);
        }
      });
      return false;
  });
  $('.detail .like').on('click',function(){
      var status = $('.detail .like').attr('status');;
      var url = $('base').attr('href');
      var id = $('.detail').attr('idfoto');
      $.ajax({
          url:url+'like/'+status+'/'+id,
          success:function(){
              var count = $('.detail .panel .likes').attr('count');
              if(status == 'likefoto'){
                ++count;
                $('.detail .like').addClass('unlike');    
                $('.detail .like').attr('status','unlikefoto');
                $('.detail .like').html('<span class="fa fa-heart"></span>');
              }
              if(status == 'unlikefoto'){
                --count;
                $('.detail .like').removeClass('unlike');    
                $('.detail .like').attr('status','likefoto');
                $('.detail .like').html('<span class="fa fa-heart-o"></span>');
              }
              $('.detail .panel .likes').html(count);
              $('.detail .panel .likes').attr('count',count);
              $('#like-'+id).html(count);
            
          }
      });
  });
  $('.add-photo').on('click',function(){
      $('.popupupload.upload').fadeIn('slow');
  });
  $('.popupupload .close').on('click',function(){
      $('.popupupload').fadeOut('slow');   
  });
  
  $('.panel-upload.formfoto form').submit(function(){
       var formData = new FormData($(this)[0]);
      $('.panel-upload .mainform').fadeOut('slow');
      $('.panel-upload .lod').fadeIn('slow');
      $.ajax({
        url:$('.panel-upload form').attr('action'),
        type:"POST",
        timeout: 60000,
        processData: false,  // tell jQuery not to process the data
        contentType: false,  // tell jQuery not to set contentType
        data: formData,
        async: false,
        success: function(data){
            if(data == 1){
                $('.panel-upload .notice').html('<br><br><br><br><h2><span class="fa fa-check"></span> Berhasil Upload</h2><h3>Sedang Refresh data....</h3>');
                $('.panel-upload .lod').fadeOut('slow',function(){
                    $('.panel-upload .notice').fadeIn('slow');
                });
                 setTimeout(function () {
                    location.reload()
                }, 2000);
            }else{
                $('.panel-upload .notice').html('<br><br><br><br><h2><span class="fa fa-close"></span> Gagal Upload</h2><h3>Cek Gambar Anda</h3><a onclick="retryImageUpload()">Coba Lagi</a>');
                $('.panel-upload .lod').fadeOut('slow',function(){
                    $('.panel-upload .notice').fadeIn('slow');
                });
            }
        },
        error: function(){
            $('.panel-upload .notice').html('<br><br><br><br><h2><span class="fa fa-close"></span> Gagal Upload</h2><h3>Cek Koneksi Anda</h3><a onclick="retryImageUpload()">Coba Lagi</a>');
            $('.panel-upload .lod').fadeOut('slow',function(){
                $('.panel-upload .notice').fadeIn('slow');
            });
        }
      });
      return false; 
  });
  $('.item figure .overlay').on('click',function(){
    
    var ajaxurl = $(this).parent().attr('url');
    var url = $('base').attr('href');
    $('.loading').fadeIn('slow');
    $.ajax({
        url: ajaxurl,
        dataType: 'json',
        success: function(result){
          $('.loading').fadeOut();
          var islike = result.foto[0].islike;
          var edit = '&nbsp; &nbsp;<span class="editcomment fa fa-pencil"></span>&nbsp; '+
                  '<span class="deletecomment fa fa-trash-o" ></span>';
          if(result.foto[0].editable == 1){
                $('.detail .panel .edit,.detail .panel .delete').show();
          }else{
                $('.detail .panel .edit,.detail .panel .delete').hide();
          }
          $('.detail .panel .delete').attr('idfoto',result.foto[0].idFoto);
          $('.popeditfoto input[name="idfoto"]').val(result.foto[0].idFoto);
          $('.popeditfoto input[name="location"]').val(result.foto[0].location);
          $('.popeditfoto textarea[name="caption"]').html(result.foto[0].caption);
          $('.detail').attr('idfoto',result.foto[0].idFoto);
          $('.detail .panel .photo').attr('src',"img/foto/"+result.foto[0].link_foto);
          $('.detail .panel .profile .profilepict').attr('src',"img/pp/"+result.foto[0].foto_profil);
          $('.detail .panel .profile a').html(result.foto[0].username);
          $('.detail .panel .profile a').attr('href',url+'profil/lihatprofil/'+result.foto[0].username);
          $('.detail .panel .comments').html(result.foto[0].comment);
          $('.detail .panel .comments').attr('count',result.foto[0].comment);
          $('.detail .panel .loc').html(result.foto[0].location);
          $('.detail .panel .likes').html(result.foto[0].like);
          $('.detail .panel .likes').attr('count',result.foto[0].like);
          $('.detail .panel .time').html(result.foto[0].tanggal);
          $('.detail .commend input').val('');
          if(islike>0){
              $('.detail .like').addClass('unlike');    
              $('.detail .like').attr('status','unlikefoto');
              $('.detail .like').html('<span class="fa fa-heart"></span>');
          }else{
              $('.detail .like').removeClass('unlike');    
              $('.detail .like').attr('status','likefoto');
              $('.detail .like').html('<span class="fa fa-heart-o"></span>');
          }
          var k = result.komentar;
          var html = '<li><a href="'+url+'profil/lihatprofil/'+result.foto[0].username+'">'+result.foto[0].username+'</a>'+result.foto[0].caption+'</li>';
          for(i = 0; i < k.length; i++){
              if(result.foto[0].session == k[i].member){
                  html += '<li idcomment="'+k[i].idKomentar+'"><a href="'+url+'profil/lihatprofil/'+k[i].member+'">' + k[i].member + '</a><font>'+ k[i].isiKomentar + '</font>' + edit +'</li>';
              }else{
                html += '<li idcomment="'+k[i].idKomentar+'"><a href="'+url+'profil/lihatprofil/'+k[i].member+'">' + k[i].member + '</a>'+ k[i].isiKomentar +'</li>';
              }
          }
          $('.detail .panel .comment').html(html);
          $('.detail').css('display','inherit');
          $('.detail .panel').addClass('animated zoomInUp');
    }});

    setTimeout(function(){
      $('.detail .panel').removeClass('animated zoomInUp');
    }, 1000);
  })
  $('.detail .close').on('click',function(){
    $('.detail .panel').addClass('animated zoomOutDown');
    setTimeout(function(){
      $('.detail').css('display','none');
      $('.detail .panel').removeClass('animated zoomOutDown');
    }, 1000);
  })
  /*$('.logo-container img').hover(function(){

    $(this).addClass('animated tada');
    setTimeout(function(){
      $(this).removeClass('animated tada');
    }, 2000);
  })*/
    setTimeout(function(){
        $('.message').fadeOut('slow');
    },3000);
})
