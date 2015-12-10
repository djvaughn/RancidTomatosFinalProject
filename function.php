
    <?php
    /*
    This class has two private variables, browserImage and bigImage.
     The constructor sets them both to empty strings.  Then when setImages
     is passed a movie's rating it sets the Images based on if it is rotten or fresh.
     Then there are getters for each image
    */
    class WebImages {
        private $browserImage;
        private $bigImage;

        public function __construct(){
           $this->bigImage="";
            $this->browserImage="";
        }
        public function setImages($rating){
            if ($rating>=60) {
                $this->browserImage="fresh.gif";
                $this->bigImage="freshlarge.png";
            }else{
                $this->browserImage="rotten.gif";
                $this->bigImage="rottenlarge.png";
            }
        }

        public function getBrowserImage(){
            return $this->browserImage;
        }
         public function getBigImage(){
            return $this->bigImage;
        }
    }

    ?>