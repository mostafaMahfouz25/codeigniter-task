<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Task</title>
  </head>
  <body>
    <h1 class="text-center bg-primary py-3 mb-2">Task</h1>


    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                <form class="border my-5 p-3">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Categories</label>
                        <div class="form-group">
                            <select class="form-control cat" id="exampleFormControlSelect1">
                                <option>Choose Category ....</option>
                                <?php 
                                    foreach($cats as $row)
                                    { ?>
                                        <option value="<?php echo $row->cat_id; ?>"><?php echo $row->cat_name; ?></option>
                                    <?php 
                                    }
                                    
                                    
                                ?>
                            
                          
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sub Categories</label>
                        <div class="form-group">
                            <select class="form-control subcats" id="exampleFormControlSelect1">
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" id="csrf"/>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  
        <script>

            $(".cat").on("change",()=>
            {
                const parentId = $(".cat").val();
                // alert(parentId);
                    $.ajax({
                        url: "<?php echo base_url("/home/getSub/");?>",
                        type: 'post',
                        dataType:'html',
                        data: {id: parentId,csrf_token: $('#csrf').val()},
                        success: function (html) 
                        {
                           $(".subcats").html("");
                           $(".subcats").html(html);
                        },

                    })

            })



        </script>





    </body>
</html>