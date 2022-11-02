<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css" integrity="sha512-0/rEDduZGrqo4riUlwqyuHDQzp2D1ZCgH/gFIfjMIL5az8so6ZiXyhf1Rg8i6xsjv+z/Ubc4tt1thLigEcu6Ug==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <!-- custom css  -->
    <link rel="stylesheet" href="./style.css">

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

    <!-- if youre having file too large issues- go to apache -->

    <?php
        // //get current file path to code
        // $getCurrentPath = getcwd()."/uploads/";
        // $items = scandir($getCurrentPath);
        // var_dump($items[2]);

        include_once('list.php');

    ?>

<div class="container flex-grow-1 light-style container-p-y">
    <div class="container-m-nx container-m-ny bg-lightest mb-3">
        <h1 style = "text-align: center;"> PHP FILE MANAGER</h1>

        <hr class="m-0" />

        <div class="file-manager-actions container-p-x py-2">
            <div>
                <button type="button" data-toggle="modal" data-target="#upload" class="btn btn-primary mr-2"><i class="ion ion-md-cloud-upload"></i>&nbsp; Upload</button>
            </div>
        </div>

        <hr class="m-0" />
    </div>

    <div class="file-manager-container file-manager-col-view">

        <?php
            foreach($finalArray as $key => $type){

                //call index = uniqid to be able to generate a uniqid everytime a func is fired 
                $index = uniqid();

                //check if there is a .txt file and read it
                if( $type == 'txt' ){
                    $text = readDoc("uploads/$key");
                }

                if( $type == 'png' || $type == 'jpg' || $type == 'jpeg' ){

                    echo("

                    <div class='file-item' data-toggle='modal' data-target='#image$index' >
                    <div class='file-item-select-bg bg-primary'></div>
                    <label class='file-item-checkbox custom-control custom-checkbox'>
                        <input type='checkbox' class='custom-control-input' />
                        <span class='custom-control-label'></span>
                    </label>
                    <div class='file-item-icon fas fa-image text-secondary'></div>
                    <a href='javascript:void(0)' class='file-item-name'>
                        $key
                    </a>
                    <div class='file-item-changed'>02/26/2018</div>
                    <div class='file-item-actions btn-group'>
                        <button type='button' class='btn btn-default btn-sm rounded-pill icon-btn borderless md-btn-flat hide-arrow dropdown-toggle' data-toggle='dropdown'><i class='ion ion-ios-more'></i></button>
                        <div class='dropdown-menu dropdown-menu-right'>
                        <a class='dropdown-item' href='javascript:void(0)'>Move</a>
                        <a class='dropdown-item' href='javascript:void(0)'>Copy</a>
                        <form action='delete.php' method='post'>
                            <input type='hidden' name='file_name' value='$key'>
                            <input class='dropdown-item' type='submit' value='delete'>
                        </form>
                        </div>
                    </div>
                    </div>
        

                    <div class='modal' tabindex='-1' id='image$index'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>$key</h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                <img src='uploads/$key'>
                            </div>
                        </div>
                    </div>

                ");
                }

                if( $type == 'mp3' || $type == 'wav'){
                    
                      echo    ("

                        <div class='file-item' data-toggle='modal' data-target='#Audio$index' >
                        <div class='file-item-select-bg bg-primary'></div>
                        <label class='file-item-checkbox custom-control custom-checkbox'>
                            <input type='checkbox' class='custom-control-input' />
                            <span class='custom-control-label'></span>
                        </label>
                        <div class='file-item-icon far fa-file-audio text-secondary'></div>
                        <a href='javascript:void(0)' class='file-item-name'>
                            $key
                        </a>
                        <div class='file-item-changed'>02/26/2018</div>
                        <div class='file-item-actions btn-group'>
                            <button type='button' class='btn btn-default btn-sm rounded-pill icon-btn borderless md-btn-flat hide-arrow dropdown-toggle' data-toggle='dropdown'><i class='ion ion-ios-more'></i></button>
                            <div class='dropdown-menu dropdown-menu-right'>
                            <a class='dropdown-item' href='javascript:void(0)'>Move</a>
                            <a class='dropdown-item' href='javascript:void(0)'>Copy</a>
                            <form action='delete.php' method='post'>
                                <input type='hidden' name='file_name' value='$key'>
                                <input class='dropdown-item' type='submit' value='delete'>
                            </form>
                            </div>
                        </div>
                        </div>


                        <div class='modal' tabindex='-1' id='Audio$index'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>$key</h5>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>

                                    <audio src='uploads/$key' controls autoplay></audio>

                                </div>
                            </div>
                        </div>

                    ");

                }


                if( $type == 'mp4' || $type == 'mkv' || $type == 'avi'){
                    
                    echo    ("

                    <div class='file-item' data-toggle='modal' data-target='#Video$index' >
                    <div class='file-item-select-bg bg-primary'></div>
                    <label class='file-item-checkbox custom-control custom-checkbox'>
                        <input type='checkbox' class='custom-control-input' />
                        <span class='custom-control-label'></span>
                    </label>
                    <div class='file-item-icon far fa-file-audio text-secondary'></div>
                    <a href='javascript:void(0)' class='file-item-name'>
                        $key
                    </a>
                    <div class='file-item-changed'>02/26/2018</div>
                    <div class='file-item-actions btn-group'>
                        <button type='button' class='btn btn-default btn-sm rounded-pill icon-btn borderless md-btn-flat hide-arrow dropdown-toggle' data-toggle='dropdown'><i class='ion ion-ios-more'></i></button>
                        <div class='dropdown-menu dropdown-menu-right'>
                        <a class='dropdown-item' href='javascript:void(0)'>Move</a>
                        <a class='dropdown-item' href='javascript:void(0)'>Copy</a>
                        <form action='delete.php' method='post'>
                            <input type='hidden' name='file_name' value='$key'>
                            <input class='dropdown-item' type='submit' value='delete'>
                        </form>
                        </div>
                    </div>
                    </div>



                    <div class='modal' tabindex='-1' id='Video$index'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h5 class='modal-title'>$key</h5>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                <video src='uploads/$key' controls autoplay></video>
                            </div>
                        </div>
                    </div>


                ");
              }

              if( $type == 'txt' ){

                echo("

                <div class='file-item' data-toggle='modal' data-target='#txt$index' >
                <div class='file-item-select-bg bg-primary'></div>
                <label class='file-item-checkbox custom-control custom-checkbox'>
                    <input type='checkbox' class='custom-control-input' />
                    <span class='custom-control-label'></span>
                </label>
                <div class='file-item-icon far fa-file text-secondary'></div>
                <a href='javascript:void(0)' class='file-item-name'>
                    $key
                </a>
                <div class='file-item-changed'>02/26/2018</div>
                <div class='file-item-actions btn-group'>
                    <button type='button' class='btn btn-default btn-sm rounded-pill icon-btn borderless md-btn-flat hide-arrow dropdown-toggle' data-toggle='dropdown'><i class='ion ion-ios-more'></i></button>
                    <div class='dropdown-menu dropdown-menu-right'>
                        <a class='dropdown-item' href='javascript:void(0)'>Move</a>
                        <a class='dropdown-item' href='javascript:void(0)'>Copy</a>
                        <form action='delete.php' method='post'>
                            <input type='hidden' name='file_name' value='$key'>
                            <input class='dropdown-item' type='submit' value='delete'>
                        </form>
                    </div>
                </div>
                </div>
    

                <div class='modal' tabindex='-1' id='txt$index'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5 class='modal-title'>$key</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                
                            </div>

                            <div class='p-5'>
                                $text
                            </div>


                        </div>
                    </div>
                </div>

            ");
            }

            };

        ?>


    </div>

    <!-- modal comp -->

    <div class="modal" tabindex="-1" id="upload">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="file" name="file" id="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Upload</button> -->
                        <input type="submit" class="btn btn-primary" value="upload">
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>