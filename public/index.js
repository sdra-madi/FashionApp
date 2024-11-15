const sidemenu =document.querySelector("aside");
const menubtn =document.querySelector("#menu-btn");
const closebtn =document.querySelector("#close-btn");
const themetoggler = document.querySelector(".theme-toggler");
//show side bar
menubtn.addEventListener('click',()=>{
    sidemenu.style.display = 'block';
}
)
//close side bar
closebtn.addEventListener('click',()=>{
    sidemenu.style.display = 'none';
}
)

//change theme
themetoggler.addEventListener('click',()=>{
    document.body.classList.toggle('dark-theme-variables');

    themetoggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themetoggler.querySelector('span:nth-child(2)').classList.toggle('active');
})
$(document).ready(function(){

    $('.small-image img').click(function(){

        $(this).addClass('image-active').siblings().removeClass('image-active');
        let image = $(this).attr('src');
        $('.big-image img').attr('src', image);

    });

});


// first multiy color [slector1 -> slector4] for size1
{
            var num1 = document.getElementById("col_8");
            var num2 = document.getElementById("col_9");
            var num3 = document.getElementById("col_10");
            var num4 = document.getElementById("col_11");
            num1.style.visibility = "hidden";
            num2.style.visibility = "hidden";
            num3.style.visibility = "hidden";
            num4.style.visibility = "hidden";
            var color =['أحمر','أخضر','أصفر','أسود','أبيض','أزرق','برتقالي','بنفسجي','زهري','بني'];
            let slctcolor1 = document.getElementById("slctcolor1");
            let slctcolor2 = document.getElementById("slctcolor2");
            let slctcolor3 = document.getElementById("slctcolor3");
            let slctcolor4 = document.getElementById("slctcolor4");
            var mp = new Map();
            for(let i = 0 ; i < 10 ; ++ i ) {
                let op = document.createElement("option");
                mp.set(color[i],1);
                op.text = color[i];
                op.value = color[i] ;
                slctcolor1.appendChild(op);
            }
            let last =[" " , " " , " " ] ;
            let x = document.querySelector(".slctcolor1");
            let y = document.querySelector(".slctcolor2");
            let z = document.querySelector(".slctcolor3");
            let u = document.querySelector(".slctcolor4");
            slctcolor1.onchange = function () {
            slctcolor2.innerHTML = "<option></option>";
                    if( last[0] != " ")mp.set(last[0],1);
                    last[0] = this.value;
                    mp.delete(this.value);
                    x.style.pointerEvents = "none";
                    num1.style.visibility = "visible";
                    addToas(color,slctcolor2);
            }
            slctcolor2.onchange = function () {
            slctcolor3.innerHTML = "<option></option>";
                    if( last[1] != " ")mp.set(last[1],1);
                    last[1] = this.value;
                    mp.delete(this.value);
                    y.style.pointerEvents = "none";
                    num2.style.visibility = "visible";
                    addToas(color,slctcolor3);
            }
            slctcolor3.onchange = function () {
            slctcolor4.innerHTML = "<option></option>";
                    if( last[2] != " ")mp.set(last[2],1);
                    last[2] = this.value;
                    mp.delete(this.value);
                    z.style.pointerEvents = "none";
                    num3.style.visibility = "visible";
                    addToas(color,slctcolor4);
            }
            slctcolor4.onchange = function (){
                u.style.pointerEvents = "none";
                num4.style.visibility = "visible";
            }
            function addToas(arr,sel) {
                for(let i = 0 ; i < 10 ; ++ i )
                {
                    if(mp.get(color[i]) == 1 )
                    {
                        let option = document.createElement("option");
                        option.text = color[i] ;
                        option.value = color[i] ;
                        sel.appendChild(option);
                    }
                }
            };
            function res() {
                x.style.pointerEvents = "all";
                y.style.pointerEvents = "all";
                z.style.pointerEvents = "all";
                u.style.pointerEvents = "all";
                num1.style.display = "none";
                num2.style.display = "none";
                num3.style.display = "none";
                num4.style.display = "none";
                slctcolor1.innerHTML = "<option></option>";
                for(let i = 0 ; i < 10 ; ++ i ) {
                let op = document.createElement("option");
                mp.set(color[i],1);
                op.text = color[i];
                op.value = color[i] ;
                slctcolor1.appendChild(op);
                }
                slctcolor2.innerHTML = "<option></option>";
                slctcolor3.innerHTML = "<option></option>";
                slctcolor4.innerHTML = "<option></option>";
            }
}
// second multiy color [slector5 -> slector8] for size2
{
            var color =['أحمر','أخضر','أصفر','أسود','أبيض','أزرق','برتقالي','بنفسجي','زهري','بني'];
            let slctcolor5 = document.getElementById("slctcolor5");
            let slctcolor6 = document.getElementById("slctcolor6");
            let slctcolor7 = document.getElementById("slctcolor7");
            let slctcolor8 = document.getElementById("slctcolor8");
            var num5 = document.getElementById("col_1");
            var num6 = document.getElementById("col_2");
            var num7 = document.getElementById("col_3");
            var num8 = document.getElementById("col_13");
            num5.style.visibility = "hidden";
            num6.style.visibility = "hidden";
            num7.style.visibility = "hidden";
            num8.style.visibility = "hidden";
            var mp1 = new Map();
            for(let i = 0 ; i < 10 ; ++ i ) {
                let op = document.createElement("option");
                mp1.set(color[i],1);
                op.text = color[i];
                op.value = color[i] ;
                slctcolor5.appendChild(op);
            }
            let last1 =[" " , " " , " " ] ;
            let x1 = document.querySelector(".slctcolor5");
            let y1 = document.querySelector(".slctcolor6");
            let z1 = document.querySelector(".slctcolor7");
            let u1 = document.querySelector(".slctcolor8");
            slctcolor5.onchange = function () {
            slctcolor6.innerHTML = "<option></option>";
                    if( last1[0] != " ")mp1.set(last1[0],1);
                    last1[0] = this.value;
                    mp1.delete(this.value);
                    x1.style.pointerEvents = "none";
                    num5.style.visibility = "visible";
                    addToas(color,slctcolor6);
            }
            slctcolor6.onchange = function () {
            slctcolor7.innerHTML = "<option></option>";
                    if( last1[1] != " ")mp1.set(last1[1],1);
                    last1[1] = this.value;
                    mp1.delete(this.value);
                    y1.style.pointerEvents = "none";
                    num6.style.visibility = "visible";
                    addToas(color,slctcolor7);
            }
            slctcolor7.onchange = function () {
            slctcolor8.innerHTML = "<option></option>";
                    if( last1[2] != " ")mp1.set(last1[2],1);
                    last1[2] = this.value;
                    mp1.delete(this.value);
                    z1.style.pointerEvents = "none";
                    num7.style.visibility = "visible";
                    addToas(color,slctcolor8);
            }
            slctcolor8.onchange = function (){
                u1.style.pointerEvents = "none";
                num8.style.visibility = "visible";
            }
            function addToas(arr,sel) {
                for(let i = 0 ; i < 10 ; ++ i )
                {
                    if(mp1.get(color[i]) == 1 )
                    {
                        let option = document.createElement("option");
                        option.text = color[i] ;
                        option.value = color[i] ;
                        sel.appendChild(option);
                    }
                }
            };
            function res1() {
                x1.style.pointerEvents = "all";
                y1.style.pointerEvents = "all";
                z1.style.pointerEvents = "all";
                u1.style.pointerEvents = "all";
                num5.style.visibility = "hidden";
                num6.style.visibility = "hidden";
                num7.style.visibility = "hidden";
                num8.style.visibility = "hidden";
                slctcolor5.innerHTML = "<option></option>";
                for(let i = 0 ; i < 10 ; ++ i ) {
                let op = document.createElement("option");
                mp1.set(color[i],1);
                op.text = color[i];
                op.value = color[i] ;
                slctcolor5.appendChild(op);
                }
                slctcolor6.innerHTML = "<option></option>";
                slctcolor7.innerHTML = "<option></option>";
                slctcolor8.innerHTML = "<option></option>";
            }
}
// third multiy color [slector9 -> slector12] for size3
 {
            var color =['أحمر','أخضر','أصفر','أسود','أبيض','أزرق','برتقالي','بنفسجي','زهري','بني'];
            let slctcolor9 = document.getElementById("slctcolor9");
            let slctcolor10 = document.getElementById("slctcolor10");
            let slctcolor11 = document.getElementById("slctcolor11");
            let slctcolor12 = document.getElementById("slctcolor12");
            var num9 = document.getElementById("col_5");
            var num10 = document.getElementById("col_6");
            var num11 = document.getElementById("col_7");
            var num12 = document.getElementById("col_12");
            num9.style.visibility = "hidden";
            num10.style.visibility = "hidden";
            num11.style.visibility = "hidden";
            num12.style.visibility = "hidden";
            var mp2 = new Map();
            for(let i = 0 ; i < 10 ; ++ i ) {
                let op = document.createElement("option");
                mp2.set(color[i],1);
                op.text = color[i];
                op.value = color[i] ;
                slctcolor9.appendChild(op);
            }
            let last2 =[" " , " " , " " ] ;
            let x2 = document.querySelector(".slctcolor9");
            let y2 = document.querySelector(".slctcolor10");
            let z2 = document.querySelector(".slctcolor11");
            let u2 = document.querySelector(".slctcolor12");
            slctcolor9.onchange = function () {
            slctcolor10.innerHTML = "<option></option>";
                    if( last2[0] != " ")mp2.set(last2[0],1);
                    last2[0] = this.value;
                    mp2.delete(this.value);
                    x2.style.pointerEvents = "none";
                    num9.style.visibility = "visible";
                    addToas(color,slctcolor10);
            }
            slctcolor10.onchange = function () {
            slctcolor11.innerHTML = "<option></option>";
                    if( last2[1] != " ")mp2.set(last2[1],1);
                    last2[1] = this.value;
                    mp2.delete(this.value);
                    y2.style.pointerEvents = "none";
                    num10.style.visibility = "visible";
                    addToas(color,slctcolor11);
            }
            slctcolor11.onchange = function () {
            slctcolor12.innerHTML = "<option></option>";
                    if( last2[2] != " ")mp2.set(last2[2],1);
                    last2[2] = this.value;
                    mp2.delete(this.value);
                    z2.style.pointerEvents = "none";
                    num11.style.visibility = "visible";
                    addToas(color,slctcolor12);
            }
            slctcolor12.onchange = function (){
                u2.style.pointerEvents = "none";
                num12.style.visibility = "visible";
            }
            function addToas(arr,sel) {
                for(let i = 0 ; i < 10 ; ++ i )
                {
                    if(mp2.get(color[i]) == 1 )
                    {
                        let option = document.createElement("option");
                        option.text = color[i] ;
                        option.value = color[i] ;
                        sel.appendChild(option);
                    }
                }
            };
            function res2() {
                x2.style.pointerEvents = "all";
                y2.style.pointerEvents = "all";
                z2.style.pointerEvents = "all";
                u2.style.pointerEvents = "all";
                num9.style.visibility = "hidden";
                num10.style.visibility = "hidden";
                num11.style.visibility = "hidden";
                num12.style.visibility = "hidden";
                slctcolor9.innerHTML = "<option></option>";
                for(let i = 0 ; i < 10 ; ++ i ) {
                let op = document.createElement("option");
                mp2.set(color[i],1);
                op.text = color[i];
                op.value = color[i] ;
                slctcolor9.appendChild(op);
                }
                slctcolor10.innerHTML = "<option></option>";
                slctcolor11.innerHTML = "<option></option>";
                slctcolor12.innerHTML = "<option></option>";
            }
 }

//in order to vaild value
function truee(one,two)
{
            var form = document.getElementById("form");
            var pass = document.getElementById(one).value ;
            var text = document.getElementById(two) ;
            var error = /^[-]?^[0-9]/ ;

            if(pass.match(error) ){
                form.classList.add("valid");
                form.classList.remove("invalid");
                text.innerHTML = "  " ;
            }
            else
            {
                form.classList.remove("valid");
                form.classList.add("invalid");
                text.innerHTML = "X" ;
                text.style.color = "red";
            }
}

// classification
        let type =["رجالي","نسائي","ولادي"];
        let man =["بنطال","قميص","طقم","بلوزة"];
        let woman =["فستان","هودي","بلوزة","بنطال","طقم "];
        let kids =["فستان","بلوزة","بنطال","طقم ","قميص","تنورة"];

        let slct1 =document.getElementById("slct1");
        let slct2 =document.getElementById("slct2");

        for(let i = 0 ; i < 3 ; ++ i ) {
            let op = document.createElement("option");
            op.text = type[i];
            op.value = type[i] ;
            slct1.appendChild(op);
        }
        slct1.onchange = function () {
            slct2.innerHTML = "<option></option>";
            if(this.value == type[0]){
                addToslct2(man);
            }
            if(this.value == type[1]){
                addToslct2(woman);
            }
            if(this.value == type[2]){
                addToslct2(kids);
            }
        }
        function addToslct2(arr) {
            arr.forEach(function (item) {
            let option = document.createElement("option");
            option.text = item ;
            option.value = item ;
            slct2.appendChild(option);
            });
        }












         // var arr = ['1','2','3','4','5','6','7','8','9','0'] ;
            // let flag = true ;
            // for(let i = 0 ; i < pass.length ; ++ i )
            // {
            //     let ok = true ;
            //     for(let j = 0 ; j < arr.length ; ++ j )
            //     {
            //         if(pass[i] == arr[j])
            //         {
            //             ok = false ;
            //             break ;
            //         }
            //     }
            //     if(ok == true)
            //     {
            //         flag = false ;
            //         break ;
            //     }
            // }
            // if( flag == false && pass.length > 0)
            // {
            //     form.classList.remove("valid");
            //     form.classList.add("invalid");
            //     text.innerHTML = "  <br> X " ;
            //     text.style.color = "red";
            // }
            // else
            // {
            //     form.classList.remove("valid");
            //     form.classList.remove("invalid");
            //     text.innerHTML = "";
            // }
