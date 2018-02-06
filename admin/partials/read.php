<div class="wrap mail-keep">
    <?php include 'header.php' ?>
    <div class="view">

                <i class="fa fa-print fa-lg" onclick="javascript:window.print();"></i>

               <h2><?php echo $email->subject; ?></h2>
               <div><span>To: </span><?php echo $email->from; ?></div>
               <div><span>From: </span><?php echo $email->to; ?></div>
               <div class="message"><?php echo nl2br($email->message); ?></div>
    </div>
    <a href="#" onclick="window.history.go(-1); return false;"><i class="fa fa-chevron-left"></i> Back to results</a>
</div>
