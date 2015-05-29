<style>
    .pubexchange-container {
        padding:20px 0 0;
        padding-left:0;
        font-size:18px;
    }
    table {
        width:380px;
    }
    table td img {
        position:relative;
        top:3px;
        margin-left:5px;
    }
    table tr td:first-child {
        width:110px;
    }
    table input {
        width:100%;
    }
    hr {
        margin:15px 0;
        border-bottom:none;
    }
    .request_link {
        float:right;
        margin-right:10px;
        line-height:26px;
    }
    .tooltip div { /* hide and position tooltip */
        background-color:black;
        color:white;
        border-radius:5px;
        opacity:0;
        position:absolute;
        font-size:14px;
        -webkit-transition:opacity 0.5s;
        -moz-transition:opacity 0.5s;
        -ms-transition:opacity 0.5s;
        -o-transition:opacity 0.5s;
        transition:opacity 0.5s;
        width:200px;
        padding:10px;
        margin-left:30px;
        margin-top:-45px;
    }
    table .tooltip:hover div { /* display tooltip on hover */
        opacity:1;
    }
    .label-success {
        font-size:17px;
        display:block;
        margin-top:10px;
        color:green;
    }
    .label-error {
        font-size:17px;
        display:block;
        margin-top:10px;
        color:red;
    }
    .apply_button{
        margin-top:20px !important;
    }
</style>
<div class="pubexchange-container">
    <img src='<?php echo $this->plugin_url.'img/pubexchange.png' ?>'/>
    <hr>

    <form method="POST">
        <table>
            <tr>
                <td>Publication ID</td>
                <td>
                    <input type="text" name="pubexchange_publication_id" placeholder="publication" value="<?php echo htmlspecialchars($settings["pubexchange_publication_id"]) ?>"/>
                </td>
                <td class='tooltip'>
                    <img src='<?php echo $this->plugin_url.'img/qmark.png' ?>'/>
                    <div>Please contact your PubExchange representative to receive the Publication ID </div>
                </td>
            </tr>
            <tr>
                <td colspan='2' style='line-height:26px; font-size:13px;'>
                    Don't have a Publication ID?
                    <a style='float:inherit; margin-left:5px;' class='request_link' href=' https://www.pubexchange.com/#sign-up' target='_blank'>Sign-up for an account</a>
                </td>
            </tr>
        </table>

        <hr style='margin-bottom:25px; margin-top:5px;'>

        <table>
            <tr>
                <td>Widget ID</td>
                <td>
                    <input type="text" value="<?php echo $settings["pubexchange_widget_id"] ?>" name="pubexchange_widget_id" placeholder="Widget ID" />
                </td>
                <td class='tooltip'>
                    <img src='<?php echo $this->plugin_url.'img/qmark.png' ?>'/>
                    <div>Please contact your PubExchange representative to receive the Widget ID</div>
                </td>
            </tr>
            <tr>
                <td colspan='2' style='line-height:26px; font-size:13px;'>
                    Leave blank if only using a sidebar widget
                </td>
            </tr>

        </table>
        <input class='button-secondary apply_button' type="submit" value="Apply Changes"/>
    </form>
    <div style='clear:both'></div>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && count($pubexchange_errors) == 0){
        echo "<span class='label-success'>Your changes have been made! Contact a PubExchange representative to activate your account.</span>";
    }
    if(count($pubexchange_errors) > 0){
        for($i = 0; $i < count($pubexchange_errors); $i++){
            echo "<span class='label-error'>".$pubexchange_errors[$i]."</span>";
        }
    }
    ?>
</div>
<script>
    setTimeout(function(){jQuery('.label-success').fadeOut()}, 10000);
    setTimeout(function(){jQuery('.label-error').fadeOut()}, 10000);
</script>