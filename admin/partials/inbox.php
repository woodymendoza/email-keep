<div class="wrap email-keep">
    <?php include 'header.php' ?>
    <div class="email-keep-nav">
        <a href="admin.php?page=email-keep%2Finbox&type=new" title="view new messages"><div <?php if ( $type == 'new' ) { ?> class="active" <?php } ?>>New <span><?php echo $counts['new']; ?></span></div></a>
        <a href="admin.php?page=email-keep%2Finbox&type=read" title="view read messages"><div <?php if ( $type == 'read' ) { ?> class="active" <?php } ?>>Read <span><?php echo $counts['read']; ?></span></div></a>
        <a href="admin.php?page=email-keep%2Finbox&type=deleted" title="view deleted messages"><div <?php if ( $type == 'deleted' ) { ?> class="active" <?php } ?>>Deleted <span><?php echo $counts['deleted']; ?></span></div></a>
    </div>
    <form class="email-keep-form" action="admin.php?page=email-keep%2Finbox&type=<?php echo $type; ?>" method="post">
        <input type="hidden" name="page" value="email-keep%2Finbox">
        <input type="hidden" name="type" value="<?php echo $type; ?>">
        <table class="inbox">
            <thead>
                <tr>
                    <th><input type='checkbox' id="check-all"></th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>From</th>
                    <th>Subject</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($emails as $email){
                    echo "<tr>
                            <td><input type='checkbox' name='selected_emails[]' value='".$email->email_keep_id."'></td>
                            <td>".$email->date."</td>
                            <td>".$email->status."</td>
                            <td>".$email->from."</td>
                            <td>".$email->subject."</td>
                            <td><a href='admin.php?page=email-keep%2Finbox&view=".$email->email_keep_id."'>view</a></td>
                        </tr>";
                }
                ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
        <div class="email-keep-actions">
            <select name="action" title="select action">
                <option value="new">Mark checked messages as new</option>
                <option value="read" selected>Mark checked messages as read</option>
                <option value="deleted"><?php if($type=='deleted') { echo "Permanently "; } ?>Delete checked messages</option>
            </select>
            <button type="submit">Update</button>
        </div>
    </form>
</div>
