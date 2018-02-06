<div class="wrap mail-keep">

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

    <div class="view">

                <i class="fa fa-print fa-lg" onclick="javascript:window.print();"></i>

               <h2><?php echo $email->subject; ?></h2>
               <div><span>To: </span><?php echo $email->from; ?></div>
               <div><span>From: </span><?php echo $email->to; ?></div>
               <div class="message"><?php echo $email->message; ?></div>
    </div>
    <a href="#" onclick="window.history.go(-1); return false;"><i class="fa fa-chevron-left"></i> Back to results</a>
</div>
