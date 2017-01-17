<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <title>Page Builder</title>

    </head>
    <body>

    <div id="app">

        <navbar></navbar>

        <page-builder></page-builder>

    </div>

    <script>
        Laravel = {
            csrfToken: '{{ csrf_token() }}'
        };
    </script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script>
        $( function() {

            // There's the gallery and the trash
            var $gallery = $( "#gallery" ),
                $content = $( "#content" );

            // Let the gallery items be draggable
            $( "li", $gallery ).draggable({
                revert: "invalid", // when not dropped, the item will revert back to its initial position
                containment: "document",
                helper: "clone",
                cursor: "move"
            });

            // Let the trash be droppable, accepting the gallery items
            $content.droppable({
                accept: "#gallery > li",

                drop: function( event, ui ) {
                    deleteImage( ui.draggable );
                }
            });

            // Let the gallery be droppable as well, accepting items from the trash
            $gallery.droppable({
                accept: "#trash li",
                classes: {
                    "ui-droppable-active": "custom-state-active"
                },
                drop: function( event, ui ) {
                    recycleImage( ui.draggable );
                }
            });

            // Image deletion function
            var recycle_icon = "<a href='link/to/recycle/script/when/we/have/js/off' title='Recycle this image' class='ui-icon ui-icon-refresh'>Recycle image</a>";
            function deleteImage( $item ) {
                $item.fadeOut(function() {
                    var $list = $( "ul", $content ).length ?
                        $( "ul", $content ) :
                        $( "<ul class='gallery ui-helper-reset'/>" ).appendTo( $content );

                    $item.find( "a.ui-icon-trash" ).remove();
                    $item.append( recycle_icon ).appendTo( $list ).fadeIn(function() {
                        $item
                            .animate({ width: "48px" })
                            .find( "img" )
                            .animate({ height: "36px" });
                    });
                });
            }

            // Image recycle function
            var trash_icon = "<a href='link/to/trash/script/when/we/have/js/off' title='Delete this image' class='ui-icon ui-icon-trash'>Delete image</a>";
            function recycleImage( $item ) {
                $item.fadeOut(function() {
                    $item
                        .find( "a.ui-icon-refresh" )
                        .remove()
                        .end()
                        .css( "width", "96px")
                        .append( trash_icon )
                        .find( "img" )
                        .css( "height", "72px" )
                        .end()
                        .appendTo( $gallery )
                        .fadeIn();
                });
            }

            // Image preview function, demonstrating the ui.dialog used as a modal window
            function viewLargerImage( $link ) {
                var src = $link.attr( "href" ),
                    title = $link.siblings( "img" ).attr( "alt" ),
                    $modal = $( "img[src$='" + src + "']" );

                if ( $modal.length ) {
                    $modal.dialog( "open" );
                } else {
                    var img = $( "<img alt='" + title + "' width='384' height='288' style='display: none; padding: 8px;' />" )
                        .attr( "src", src ).appendTo( "body" );
                    setTimeout(function() {
                        img.dialog({
                            title: title,
                            width: 400,
                            modal: true
                        });
                    }, 1 );
                }
            }

            // Resolve the icons behavior with event delegation
            $( "ul.gallery > li" ).on( "click", function( event ) {
                var $item = $( this ),
                    $target = $( event.target );

                if ( $target.is( "a.ui-icon-trash" ) ) {
                    deleteImage( $item );
                } else if ( $target.is( "a.ui-icon-zoomin" ) ) {
                    viewLargerImage( $target );
                } else if ( $target.is( "a.ui-icon-refresh" ) ) {
                    recycleImage( $item );
                }

                return false;
            });
        } );
    </script>
    </body>
</html>
