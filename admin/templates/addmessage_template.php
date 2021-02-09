<?php
require '../../db/connect.php';
$ad_id = $_SESSION['ad_id'];
$abc = $pdo->prepare("SELECT * FROM admins a 
WHERE ad_id=:ad_id");
$abc->execute(['ad_id' => $ad_id]);
$abcd = $abc->fetch();
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="page-title">Bulk Message</h2>
            <p class="text-muted">Choose One</p>
            <div class="row">

                <div class="col-md-8">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <form action="" id="form1" method="POST" enctype="multipart/form-data">
                                <div class="row mb-4">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea class="form-control" id="message" name="n_text"></textarea>
                                        </div>
                                        <div class="messageerror"></div>

                                        <div class="form-group">
                                            <label for="assignedto">Assign to</label>
                                            <select class="select2" id="assignedto" name="assignedto">
                                                <optgroup label="Select one">
                                                    <option data-label="all" value="all">All</option>
                                                </optgroup>
                                                <optgroup label="Roles">
                                                    <?php $gg = $pdo->prepare("SELECT * FROM roles WHERE NOT r_name='admin'");
                                                    $gg->execute();
                                                    $ggg = $gg->fetchAll();
                                                    foreach ($ggg as $g) {
                                                        echo '<option value="' . $g['r_id'] . '" data-label="roles">' . $g['r_name'] . '</option>';
                                                    }
                                                    ?>

                                                </optgroup>
                                                <optgroup label="Users">
                                                    <option data-label="customers" value="customers">Customers</option>
                                                </optgroup>

                                            </select>
                                        </div>
                                        <div id="bload">
                                            <button type="submit" class="btn btn-primary" id="pushmessage">Push</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#pushmessage", function(e) {
        e.preventDefault();
        var avalid = false;
        var messagetext = $("#message").val();
        var sendto = $("#assignedto").val();
        var sendper = $("#assignedto option:checked").data("label");
        if ($.trim(messagetext) == '') {
            $("#message").css("border", "2px solid red");
            avalid = false;
        } else {
            $("#message").css("border", "");
            avalid = true;
        }
        if (avalid == true) {
            $("#bload").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            $.ajax({
                type: "POST",
                url: "../ajax_controller/addmessage_controller.php",
                data: {
                    bm_text: messagetext,
                    bm_to: sendto,
                    sendper: sendper,
                    action: 'sendbulk'
                },
                success: function(data) {
                    alert(data);
                    $().msgpopup({
                        text: 'Added Successfully',
                        type: 'success'
                    });
                    $("#form1")[0].reset();
                    $("#bload").html('<button type="submit" class="btn btn-primary" id="pushmessage">Push</button>');
                }
            });
        } else {
            $().msgpopup({
                text: 'Error',
                type: 'error'
            });
        }
    });
</script>