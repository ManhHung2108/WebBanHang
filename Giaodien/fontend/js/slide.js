const header = document.querySelector("header");
        window.addEventListener("scroll",function(){
            x = window.pageYOffset
            if(x>0){
                header.classList.add("sticky")
            }
            else{
                header.classList.remove("sticky")
            }
        })

        //-------------------Slide-----------------------------------
        const imgPosition = document.querySelectorAll(".aspect-ratio-169 img");
        const imgContainer = document.querySelector('.aspect-ratio-169');
        const dotItem = document.querySelectorAll(".dot");
        const imgNumber = imgPosition.length;
        let index = 0;

        //console.log(imgPosition)
        imgPosition.forEach(function(image,index){
            // console.log(image,index)
            image.style.left = index * 100 + "%";             //Ban đầu
            dotItem[index].addEventListener("click", function(){
                Slider(index);
            })
        })

        function imgSlide(){
            index++; //ban đầu 0
            if(index >= imgNumber) {index = 0;}
            Slider(index);
        }
        setInterval(imgSlide, 5000); //sau 5s sẽ làm gì trong imgSlide

        function Slider(index){
            imgContainer.style.left = "-"+index*100+"%";         //Tương ứng vị trí thẻ con
            const dotActive = document.querySelector(".active"); //Chọn class active
            dotActive.classList.remove("active");                //Xóa class active đi
            dotItem[index].classList.add("active");              //Nhảy tự động thêm class active vào
        }
