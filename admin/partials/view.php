<div class="wrap mail-keep">

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
    <div id="poststuff">
        <div id="post-body" class="metabox-holder columns-2">
            <div id="post-body-content">
                <form action="options.php" method="post">
                    <?php settings_fields($settings_group); ?>
                    <?= $fields ?>
                    <div class="submit-wrap">
                        <?php submit_button($submit_text); ?>
                        <div class="spinner"></div>
                    </div>
                </form>
            </div>
        </div>
        <br class="clear">
    </div>
</div>
