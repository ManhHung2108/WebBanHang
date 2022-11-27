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

//--------------------------------Menu-SLIDERBAR-CARTEGORY---------------------------------------------
const itemsliderbar = document.querySelectorAll('.cartegory-left-li');
itemsliderbar.forEach(function(menu, index){
    menu.addEventListener("click", function(){
        menu.classList.toggle("block")
        //console.log(menu);
    })
})
//-------------------------------Product---------------------------------------------------------------
const bigImg = document.querySelector('.product-content-left-big-img img');
const smallImg = document.querySelectorAll('.product-content-left-small-img img');
smallImg.forEach(function(imgProduct, X){
    imgProduct.addEventListener("click", function(){
        bigImg.src = imgProduct.src;
    })
})
const baoquan = document.querySelector('.baoquan');
const chitiet = document.querySelector('.chitiet');
if(baoquan){
    baoquan.addEventListener("click", function(){
        document.querySelector('.product-content-right-bottom-content-chitiet').style.display="none";
        document.querySelector('.product-content-right-bottom-content-baoquan').style.display="block";
    })
}
if(chitiet){
    chitiet.addEventListener("click", function(){
        document.querySelector('.product-content-right-bottom-content-chitiet').style.display="block";
        document.querySelector('.product-content-right-bottom-content-baoquan').style.display="none";
    })
}
const button = document.querySelector('.product-content-right-bottom-top');
if(button)
{
    button.addEventListener("click", function(){
        document.querySelector('.product-content-right-bottom-container').classList.toggle('activeContent');
    })
}

