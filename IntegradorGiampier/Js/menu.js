const menuFilter =document.querySelector(".menu-tabs");
menuItems = document.querySelectorAll(".item");

menuFilter.addEventListener("click" , (event) =>{
    if (event.target.classList.contains("tab-item") &&
    !event.target.classList.contains("active")){

        event.target.classList.add('active');
        menuFilter.querySelector('.active').classList.remove("active");

        const target= event.target.getAttribute("data-target");
        menuItems.forEach((item) =>{
            if(target=== item.getAttribute("data-category") || target === 'Pizzas'){
                item.classList.remove("hide");
                item.classList.add("show");
            }
            else{
                item.classList.add("hide");
                item.classList.remove("show");
            }
        })
    }
        
    
})