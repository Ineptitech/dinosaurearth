<?php
header('Content-Type: application/json');
function GetFollowers($screenname) {
  return json_decode(file_get_contents('https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names=' . $screenname), true)[0]['followers_count'];
}
echo json_encode(array(GetFollowers('DinosaurEarth'), GetFollowers('FlatEarthOrg')));
?>
