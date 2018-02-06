<div class="wrap email-keep">

    <svg width="262px" height="48px" viewBox="0 0 262 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <!-- Generator: Sketch 48.2 (47327) - http://www.bohemiancoding.com/sketch -->
        <desc>Created with Sketch.</desc>
        <defs>
            <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-1">
                <stop stop-color="#B4EC51" offset="0%"></stop>
                <stop stop-color="#429321" offset="100%"></stop>
            </linearGradient>
        </defs>
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Group">
                <text id="EMail-Keep" font-family="RobotoSlab-Regular, Roboto Slab" font-size="36" font-weight="normal" fill="#4A8505">
                    <tspan x="69" y="38">EMail Keep</tspan>
                </text>
                <path d="M25.3574344,24.3238651 L2.22907122,48 L61.1565181,48 L38.4539775,24.2838817 L31.9866722,29.8195752 L25.3574344,24.3238651 Z M41.7625989,21.7709288 L63.7574344,44.6394002 C63.8833819,44.1955852 63.9733444,43.7357768 63.9733444,43.2499792 L63.9733444,3.72244898 L41.7625989,21.7709288 L41.7625989,21.7709288 Z M0,3.6304873 L0,43.2499792 C0,43.7357768 0.0899625156,44.1955852 0.215910037,44.6394002 L22.2847147,21.844898 L0,3.6304873 L0,3.6304873 Z M1.99916701,0 L31.9866722,24.0279883 L61.9741774,0 L1.99916701,0 Z" id="Fill-185" fill="url(#linearGradient-1)" fill-rule="nonzero"></path>
            </g>
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
                            <td>view</td>
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
