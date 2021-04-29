<?php

namespace NhienLam\hw4\views;

class View
{
   const FOLDERNAME = "photo";
   const FOLDERPATH = "src/executables/" . self::FOLDERNAME;

   function mapServerView()
   {
?>
      <form name="coordsControl" id="coordsControl" action="index.php" method="post" enctype="multipart/form-data">
         <div class="control">
            <div id="error" class="error"></div>
            <label>Coords: </label>
            <input type="text" id="iCoord" name="iCoord" placeholder="i" required>
            <input type="text" id="jCoord" name="jCoord" placeholder="j" required>
            <button type="submit" class="go" id="go" name="go">GO</button>
            <br>
         </div>
      </form>
      <form name="zoom" id="zoom" action="index.php" method="post" enctype="multipart/form-data">
         <div class="control">
            <label>Zoom: </label>
            <!-- <input type="submit" name="zoomIn" value="In" /> -->
            <button type="submit" value="In" id="zoomIn" name="zoomIn">In</button>
            <button type="submit" value="Out" id="zoomOut" name="zoomOut">Out</button>
            <br>
            <button type="submit" value="^" id="up" name="up">^</button>
            <br>
            <button type="submit" value="<" id="left" name="left"><</button>
                  <button type="submit" value=">" id="right" name="right">></button>
                  <br>
                  <button type="submit" value="v" id="down" name="down">v</button>
         </div>
      </form>

      <!-- JAVASCRIPT FUNCTION for onlclick buttons-->
      <script>
         // validate form coordinate input
         var iCoord = document.getElementById("iCoord");
         var jCoord = document.getElementById("jCoord");
         var form = document.getElementById("coordsControl");
         var errorElement = document.getElementById("error");

         form.addEventListener("submit", (e) => {
            let message = [];
            if (!(iCoord.value >= 0 && iCoord.value <= 3)) {
               message.push("i Coordinate has to be between 0-3!")
            }
            if (!(jCoord.value >= 0 && jCoord.value <= 3)) {
               message.push("j Coordinate has to be between 0-3!")
            }
            if (message.length > 0) {
               e.preventDefault();
               errorElement.innerText = message.join("\n");
            }
         });
      </script>
      </form>
   <?php
   }

    // Disable ZoomIn button
   function afterIJNM()
   {
   ?>
      <script>
         let zoomInButton = document.getElementById("zoomIn");
         let zoomOutButton = document.getElementById("zoomOut");
         function disableOut() {
            zoomInButton.disabled = true;
            zoomOutButton.disabled = false;
         }
         disableOut();
      </script>
      <?php
   }

   // Disable ZoomOut button
   function afterIJ()
   {
   ?>
      <script>
         let zoomInButton = document.getElementById("zoomIn");
         let zoomOutButton = document.getElementById("zoomOut");
         function disableIn() {
            zoomOutButton.disabled = true;
            zoomInButton.disabled = false;
         }
         disableIn();
      </script>
      <?php
   }

   // display 3x3 grid of ij.jpg images
   function displayIJgrid($iCenter, $jCenter)
   {
      ?>
      <b>Coords: [<?php echo $iCenter . "," . $jCenter; ?>]</b>
      <div id="displayIJgrid">
         <div class="grid">
            <!-- box #1 -->
            <div class="box"><img src="<?php if (($iCenter - 1) >= 0 && ($iCenter - 1) <= 3 && ($jCenter - 1) >= 0 && ($jCenter - 1) <= 3) {
                                          echo self::FOLDERPATH . "/" . ($iCenter - 1) . ($jCenter - 1);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #2 -->
            <div class="box"><img src="<?php if (($iCenter) >= 0 && ($iCenter) <= 3 && ($jCenter - 1) >= 0 && ($jCenter - 1) <= 3) {
                                          echo self::FOLDERPATH . "/" . ($iCenter) . ($jCenter - 1);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #3 -->
            <div class="box"><img src="<?php if (($iCenter + 1) >= 0 && ($iCenter + 1) <= 3 && ($jCenter - 1) >= 0 && ($jCenter - 1) <= 3) {
                                          echo self::FOLDERPATH . "/" . ($iCenter + 1) . ($jCenter - 1);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #4 -->
            <div class="box"><img src="<?php if (($iCenter - 1) >= 0 && ($iCenter - 1) <= 3 && ($jCenter) >= 0 && ($jCenter) <= 3) {
                                          echo self::FOLDERPATH . "/" . ($iCenter - 1) . ($jCenter);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #5 -->
            <div class="box"><img src="<?php echo self::FOLDERPATH . "/" . $iCenter . $jCenter; ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #6 -->
            <div class="box"><img src="<?php if (($iCenter + 1) >= 0 && ($iCenter + 1) <= 3 && ($jCenter) >= 0 && ($jCenter) <= 3) {
                                          echo self::FOLDERPATH . "/" . ($iCenter + 1) . ($jCenter);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #7 -->
            <div class="box"><img src="<?php if (($iCenter - 1) >= 0 && ($iCenter - 1) <= 3 && ($jCenter + 1) >= 0 && ($jCenter + 1) <= 3) {
                                          echo self::FOLDERPATH . "/" . ($iCenter - 1) . ($jCenter + 1);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #8 -->
            <div class="box"><img src="<?php if (($iCenter) >= 0 && ($iCenter) <= 3 && ($jCenter + 1) >= 0 && ($jCenter + 1) <= 3) {
                                          echo self::FOLDERPATH . "/" . ($iCenter) . ($jCenter + 1);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #9 -->
            <div class="box"><img src="<?php if (($iCenter + 1) >= 0 && ($iCenter + 1) <= 3 && ($jCenter + 1) >= 0 && ($jCenter + 1) <= 3) {
                                          echo self::FOLDERPATH . "/" . ($iCenter + 1) . ($jCenter + 1);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
         </div>
      </div>
   <?php
   }

   // display 3x3 grid of ijnm.jpg images
   function displayIJNMgrid($iCenter, $jCenter, $n, $m)
   {
   ?>
      <b>Coords: [<?php echo $iCenter . "," . $jCenter . "," . $n . "," . $m; ?>]</b>
      <div id="displayIJNMgrid">
         <div class="grid">
            <!-- box #1 -->
            <div class="box"><img src="<?php if (($iCenter) >= 0 && ($iCenter) <= 3 && ($jCenter) >= 0 && ($jCenter) <= 3
                                          && ($n - 1) >= 0 && ($n - 1) <= 3 && ($m - 1) >= 0 && ($m - 1) <= 3
                                       ) {
                                          echo self::FOLDERPATH . "/" . ($iCenter) . ($jCenter) . ($n - 1) . ($m - 1);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #2 -->
            <div class="box"><img src="<?php if (($iCenter) >= 0 && ($iCenter) <= 3 && ($jCenter) >= 0 && ($jCenter) <= 3
                                          && ($n) >= 0 && ($n) <= 3 && ($m - 1) >= 0 && ($m - 1) <= 3
                                       ) {
                                          echo self::FOLDERPATH . "/" . ($iCenter) . ($jCenter) . ($n) . ($m - 1);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #3 -->
            <div class="box"><img src="<?php if (($iCenter) >= 0 && ($iCenter) <= 3 && ($jCenter) >= 0 && ($jCenter) <= 3
                                          && ($n + 1) >= 0 && ($n + 1) <= 3 && ($m - 1) >= 0 && ($m - 1) <= 3
                                       ) {
                                          echo self::FOLDERPATH . "/" . ($iCenter) . ($jCenter) . ($n + 1) . ($m - 1);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #4 -->
            <div class="box"><img src="<?php if (($iCenter) >= 0 && ($iCenter) <= 3 && ($jCenter) >= 0 && ($jCenter) <= 3
                                          && ($n - 1) >= 0 && ($n - 1) <= 3 && ($m) >= 0 && ($m) <= 3
                                       ) {
                                          echo self::FOLDERPATH . "/" . ($iCenter) . ($jCenter) . ($n - 1) . ($m);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #5 -->
            <div class="box"><img src="<?php echo self::FOLDERPATH . "/" . $iCenter . $jCenter . $n . $m; ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #6 -->
            <div class="box"><img src="<?php if (($iCenter) >= 0 && ($iCenter) <= 3 && ($jCenter) >= 0 && ($jCenter) <= 3
                                          && ($n + 1) >= 0 && ($n + 1) <= 3 && ($m) >= 0 && ($m) <= 3
                                       ) {
                                          echo self::FOLDERPATH . "/" . ($iCenter) . ($jCenter) . ($n + 1) . ($m);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #7 -->
            <div class="box"><img src="<?php if (($iCenter) >= 0 && ($iCenter) <= 3 && ($jCenter) >= 0 && ($jCenter) <= 3
                                          && ($n - 1) >= 0 && ($n - 1) <= 3 && ($m + 1) >= 0 && ($m + 1) <= 3
                                       ) {
                                          echo self::FOLDERPATH . "/" . ($iCenter) . ($jCenter) . ($n - 1) . ($m + 1);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #8 -->
            <div class="box"><img src="<?php if (($iCenter) >= 0 && ($iCenter) <= 3 && ($jCenter) >= 0 && ($jCenter) <= 3
                                          && ($n) >= 0 && ($n) <= 3 && ($m + 1) >= 0 && ($m + 1) <= 3
                                       ) {
                                          echo self::FOLDERPATH . "/" . ($iCenter) . ($jCenter) . ($n) . ($m + 1);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
            <!-- box #9 -->
            <div class="box"><img src="<?php if (($iCenter) >= 0 && ($iCenter) <= 3 && ($jCenter) >= 0 && ($jCenter) <= 3
                                          && ($n + 1) >= 0 && ($n + 1) <= 3 && ($m + 1) >= 0 && ($m + 1) <= 3
                                       ) {
                                          echo self::FOLDERPATH . "/" . ($iCenter) . ($jCenter) . ($n + 1) . ($m + 1);
                                       } else {
                                          echo self::FOLDERPATH . "/blank";
                                       } ?>.jpg" class="showImg" id="output" /></div>
         </div>
      </div>
<?php
   }
}
