<script type="text/javascript">
    // JavaScript Document
    function re_capcha()
    {
        document.getElementById('vimg').src = "./captcha_image.php";
    }
</script>
<div class="box_content inner">
    <div class="tcat"><div class="icon"><h2><?= _lienhe ?></h2></div><div class="tcat_right">&nbsp;</div></div>
    <div class="content">
		<div class="clear" style="height:20px;"></div>
		<div class="post-share" style="margin-top:10px;">
			<div class="addthis_sharing_toolbox"></div>
		</div>
		<div class="clear" style="height:20px;"></div>
		<div class="col-md-6 col-sm-12 col-xs-12">
			<?= $company_contact['noidung']; ?>
			
		</div>
		<div class="col-md-6 col-sm-12 col-xs-12">
        <form method="post" name="frm" class="forms" action="">    
            <div class="tbl-contacts">
                <div class="pad-contact">
                    <input type="text" class="form-control" name="ten" id="ten" placeholder="<?= _hovaten ?>" required oninvalid="this.setCustomValidity('<?= _hotengui ?>')" oninput="setCustomValidity('')">
                </div>                        
                <div class="pad-contact">
                    <input type="text" class="form-control" name="diachi" id="diachi" placeholder="<?= _diachi ?>" required oninvalid="this.setCustomValidity('<?= _diachigui ?>')" oninput="setCustomValidity('')">
                </div>
                <div class="pad-contact">
                    <input class="form-control" name="dienthoai" id="dienthoai" placeholder="<?= _sodienthoai ?>" type="tel" required oninvalid="this.setCustomValidity('<?= _dienthoaigui ?>')" oninput="setCustomValidity('')"></div>
                <div class="pad-contact">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required oninvalid="this.setCustomValidity('<?= _emailgui ?>')" oninput="setCustomValidity('')"></div>
                <div class="pad-contact">
                    <input type="text" class="form-control" name="tieude1" id="tieude1" placeholder="<?= _chude ?>" required oninvalid="this.setCustomValidity('<?= _chudegui ?>')" oninput="setCustomValidity('')">
                </div>                         
                <div class="pad-contact">
                    <textarea name="noidung" id="noidung" class="form-control" rows="3" required oninvalid="this.setCustomValidity('<?= _noidunggui ?>')" oninput="setCustomValidity('')"></textarea>
                </div>

                <div class="pad-contact">
                    <button type="submit" class="btn btn-success" onclick="">
                        <?= _gui ?></button>
                    <input class="btn btn-primary" type="button" value="<?= _nhaplai ?>" onclick="document.frm.reset();" />
                </div>

            </div>
        </form>
		</div>
        <div class="clear">&nbsp;</div> 
		<div id="map_canvas"></div>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD5Mevy_rl8U4ZyBB8i5jmdxfvb9Cg5UoE"></script>
        <script type="text/javascript">
                        var map;
                        var infowindow;
                        var marker = new Array();
                        var old_id = 0;
                        var infoWindowArray = new Array();
                        var infowindow_array = new Array();
                        function initialize() {
                            var defaultLatLng = new google.maps.LatLng(<?= $row_setting['toado'] ?>);
                            var myOptions = {
                                zoom: 16,
                                center: defaultLatLng,
                                scrollwheel: false,
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            };
                            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                            map.setCenter(defaultLatLng);
                            var arrLatLng = new google.maps.LatLng(<?= $row_setting['toado'] ?>);
                            infoWindowArray[7895] = '<div class="map_description"><div class="map_title"><?= $row_setting['ten_' . $lang] ?></div><div><?= $row_setting['diachi_' . $lang] ?></div></div>';
                            loadMarker(arrLatLng, infoWindowArray[7895], 7895);

                            moveToMaker(7895);
                        }
                        function loadMarker(myLocation, myInfoWindow, id) {
                            marker[id] = new google.maps.Marker({position: myLocation, map: map, visible: true});
                            var popup = myInfoWindow;
                            infowindow_array[id] = new google.maps.InfoWindow({content: popup});
                            google.maps.event.addListener(marker[id], 'mouseover', function () {
                                if (id == old_id)
                                    return;
                                if (old_id > 0)
                                    infowindow_array[old_id].close();
                                infowindow_array[id].open(map, marker[id]);
                                old_id = id;
                            });
                            google.maps.event.addListener(infowindow_array[id], 'closeclick', function () {
                                old_id = 0;
                            });
                        }
                        function moveToMaker(id) {
                            var location = marker[id].position;
                            map.setCenter(location);
                            if (old_id > 0)
                                infowindow_array[old_id].close();
                            infowindow_array[id].open(map, marker[id]);
                            old_id = id;
                        }</script>
        
        <div class="clear"></div>                                          								
    </div>
</div>