<div class="wrap email-keep">

    <svg width="199px" height="34px" viewBox="0 0 199 34" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <!-- Generator: Sketch 48.2 (47327) - http://www.bohemiancoding.com/sketch -->
        <desc>Created with Sketch.</desc>
        <defs>
            <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-1">
                <stop stop-color="#B4EC51" offset="0%"></stop>
                <stop stop-color="#429321" offset="100%"></stop>
            </linearGradient>
        </defs>
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <text id="EMail-Keep" font-family="RobotoSlab-Regular, Roboto Slab" font-size="27" font-weight="normal" fill="#4A8505">
                <tspan x="54" y="28">EMail Keep</tspan>
            </text>
            <path d="M17.961516,17.2294044 L1.57892545,34 L43.3192003,34 L27.2382341,17.2010829 L22.6572262,21.1221991 L17.961516,17.2294044 Z M29.5818409,15.4210746 L45.161516,31.6195752 C45.2507289,31.3052062 45.3144523,30.9795085 45.3144523,30.6354019 L45.3144523,2.63673469 L29.5818409,15.4210746 L29.5818409,15.4210746 Z M0,2.57159517 L0,30.6354019 C0,30.9795085 0.0637234486,31.3052062 0.152936277,31.6195752 L15.7850062,15.4734694 L0,2.57159517 L0,2.57159517 Z M1.41607663,0 L22.6572262,17.0198251 L43.8983757,0 L1.41607663,0 Z" id="Fill-185" fill="url(#linearGradient-1)" fill-rule="nonzero"></path>
        </g>
    </svg>

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
