<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Frontend</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

        <link rel="stylesheet" href="/custom.css">

    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-10 offset-md-1">
                    <a href="/" class="btn btn-outline-success">Main Page</a>
                </div>
            </div>            
            <div class="row mt-5">
                <div class="col-md-3 offset-md-1">
                    <select class="form-control" id="js-provider" name="provider">
                        <option value="">- All provider -</option>
                        <option value="Unsplash">Unsplash</option>
                        <option value="Shutterstock">Shutterstock</option>
                        <option value="Pixabay">Pixabay</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <input type="text" id="js-txt-keyword" class="form-control" placeholder="Enter keyword here...">
                </div>
                <div class="col-md-2">
                    <button type="button" id="js-btn-search" class="btn btn-primary btn-block">
                        Search
                    </button>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-10 offset-md-1" id="js-div-photos">
                    <h4><i class="color-gray">No photos</i></h4>
                </div>
                <div style="clear: both;"></div>
            </div>
        </div>

        <div id="js-div-photo-item-clone" style="display: none;">
            <div id="js-div-photo"></div>
            
            <div id="js-div-meta">
                <div class="text-right">
                    <span class="badge badge-danger" id="js-div-provider">From Shutter</span>
                </div>
                <div id="js-div-tags">
                    
                </div>
            </div>
        </div>
        
        <span class="badge badge-primary" id="js-div-tag-clone" style="display: none;">From</span>

        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script>
            $(document).ready(function() {
                $("#js-btn-search").click(function() {
                    var keyword = $("#js-txt-keyword").val();
                    var provider = $("#js-provider").val();
                    
                    $.ajax({
                        url: "/api/search",
                        dataType : "json",
                        type : "POST",
                        data: {keyword: keyword, provider: provider},
                        success : function(result) {
                            if (result.length == 0) {
                                $("div#js-div-photos").html('<h4><i class="color-gray">No photos</i></h4>');
                            } else {
                                $("div#js-div-photos").html("");
                                for (var i = 0; i < result.length; i++) {
                                    var clone = $("div#js-div-photo-item-clone").eq(0).clone();
                                    clone.attr('id', 'js-div-photo-item');
                                    clone.find("#js-div-provider").text("From " + result[i].provider);
                                    for (var j = 0; j < result[i].tags.length; j++) {
                                        
                                        var cloneTag = $("#js-div-tag-clone").eq(0).clone();
                                        cloneTag.attr('id', 'js-div-tag');
                                        cloneTag.text(result[i].tags[j]);
                                        cloneTag.show();
                                        clone.find('#js-div-tags').append(cloneTag);
                                        clone.find('#js-div-tags').append($("<span>&nbsp;</span>"));
                                    }
                                    
                                    clone.find("#js-div-photo").css('background-image', "url('" + result[i].path + "')")

                                    clone.show();
                                    $("div#js-div-photos").append(clone);
                                }
                            }
                        }
                    });
                });

                $("#js-btn-search").click();
            });
        </script>
    </body>
</html>
