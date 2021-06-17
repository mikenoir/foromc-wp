$ = $ || jQuery;

var Admin = {

    init: function(){

        var self = this;

        $('.imageList').sortable({
            items: ':not(.imageListItemDisabled)'
        });

        if(typeof wp !== 'undefined' && wp.media && wp.media.editor) {

            $('.imageAdd').on('click', function(e){
                e.preventDefault();

                self.imageAdd(this, false);
            });

            $('.imagePick').on('click', function(e){
                e.preventDefault();

                self.imageAdd(this, true);
            });

            $('.imageUpdate').on('click', function(e){
                e.preventDefault();

                self.imageAdd(this, true);
            });

            $('.imageRemove').on('click', function(e){
                e.preventDefault();

                self.imageRemove(this);
            });

            $('.imageDiscard').on('click', function(e){
                e.preventDefault();

                self.imageDiscard(this);
            });
        } 
        
        $('.color-picker').wpColorPicker();
        
        self.featuredImage();
    },
    imageAdd: function(target, update) {

        var self = this;

        var target = $(target);

        var imageList = target.closest('.imageList');

        var imageListItem = target.closest('.imageListItem');

        var imagePlaceholder = imageList.find('.imageListPlaceholder');

        var imageListName = imageList.data('image-list-name');

        wp.media.editor.send.attachment = function(props, attachment) {

            if(update){

                imageListItem.find('input[name="' + imageListName + '"]').val(attachment.id);

                imageListItem.find('.imageUpdate').removeClass('hidden');

                imageListItem.find('.imagePick').addClass('hidden');

                imageListItem.find('.imageDiscard').removeClass('hidden');

                imageListItem
                    .removeClass('imageListItemEmpty')
                    .attr('style', 'background-image: url(' + attachment.url + ');');

            }else{

                var li = $('<li class="imageListItem" style="background-image: url(' + attachment.url + ');">');

                $('<input type="hidden" name="' + imageListName + '" value="' + attachment.id + '">').appendTo(li);

                $('<button type="button" class="imageListButtonIcon imageUpdate" title="Update image"><i class="fas fa-exchange-alt"></i></button>')
                    .on('click', function(e){
                        e.preventDefault();

                        self.imageAdd(this, true);
                    })
                    .appendTo(li);

                $('<button type="button" class="imageListButtonIcon imageRemove" title="Remove image"><i class="fas fa-times"></i></button>')
                    .on('click', function(e) {
                        e.preventDefault();

                        li.remove();

                        if(imageList.find('.imageListItem').length == 0){
                            imagePlaceholder.removeClass('hidden');
                        }
                    })
                    .appendTo(li);

                imageList.prepend(li);
            }
        };

        wp.media.editor.open(null);

        imagePlaceholder.addClass('hidden');
    },
    imageRemove: function(target) {

        var self = this;

        var target = $(target);

        var imageList = target.closest('.imageList');

        var target = $(target);

        target.closest('.imageListItem').remove();

        if(imageList.find('.imageListItem').length == 0) {

            imageList.find('.imageListPlaceholder').removeClass('hidden');
        }
    },
    imageDiscard: function(target) {

        var self = this;

        var target = $(target);

        var imageList = target.closest('.imageList');

        var target = $(target);

        var imageListItem = target.closest('.imageListItem');

        var imageListName = imageList.data('image-list-name');

        imageListItem.find('input[name="' + imageListName + '"]').val('');

        imageListItem.find('.imageUpdate').addClass('hidden');

        imageListItem.find('.imagePick').removeClass('hidden');
        
        imageListItem.find('.imageDiscard').addClass('hidden');

        imageListItem
            .addClass('imageListItemEmpty')
            .removeAttr('style');
    },
    featuredImage: function() {
    
        var wp_media_post_id = typeof(wp.media) != 'undefined' ? wp.media.model.settings.post.id : null; // Store the old id
        
        if(wp_media_post_id != null){
            
            var file_frame = wp.media.frames.file_frame = wp.media({
                
                title: 'Collection image',
                button: {
                    text: 'Set collection image',
                },
                multiple: false 
            });
        
            file_frame.on('close', function(){
            
                var attachment = file_frame.state().get('selection').first().toJSON();
            
                $( '.backgroundImagePreview img').attr('src', attachment.url);
            
                $( '.backgroundImagePreview').removeClass('selectImageEmpty');
            
                $('.img-container').show();     
            
                $('.eliminar').show();
            
                $('.backgroundImageButton').hide();

                $('.backgroundImageAttachmentID').val( attachment.id );

                $('.backgroundImageContact').val( attachment.id );

                wp.media.model.settings.post.id = wp_media_post_id;
            });
        }

        if(!$('.backgroundImageAttachmentID').val())  
            $('.img-container').hide(); 

        $('.backgroundImageButton').on('click', function( event ){
        
            event.preventDefault();
        
            file_frame.open();
         });

        if($('.backgroundImageButton')){
            
            if($('.backgroundImageButton').closest('td').find('.nombre').text()=='')
                $('.backgroundImageButton').closest('td').find('.eliminar').hide();
               
        }

        if($('.backgroundImagePreview').find('img').attr('src')!=''){ 
            
            $('.backgroundImageButton').hide();
            
            $('.eliminar').show();
        }
   
    
        $(".eliminar").click(function(event){
            
            event.preventDefault();

            $( '.backgroundImagePreview img').attr('src', '');;
            
            $(this).hide();
            
            $('.backgroundImageAttachmentID').val('');
            
            $('.backgroundImageButton').show();
            
            $('.img-container').hide();              
        });

        $( 'a.add_media' ).on( 'click', function() {
            wp.media.model.settings.post.id = wp_media_post_id;
        });
    }
};

$(document).ready(Admin.init.bind(Admin));