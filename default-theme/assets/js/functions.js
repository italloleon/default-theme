document.addEventListener('DOMContentLoaded', function(){
     
    setTimeout(img_lazy_load, 1000);
}, false);




function img_lazy_load(){
    var imgs = document.getElementsByTagName("img");
    var data_styles = document.getElementsByClassName("lazy-load");

    // console.log( data_styles )
    // var mapaiframe = document.getElementById('mapa-footer');
    // var i;
    var device = 'data-style';
    var src_device = 'data-src';

    if(window.innerWidth < 420){
        device = 'data-style-mobile';
        src_device = 'data-src-mobile';
    }

    
	
    // mapaiframe.setAttribute('src', mapaiframe.getAttribute('data-src'));

    for(let i = 0; i < imgs.length; i++){
        if(imgs[i].getAttribute(src_device) != null ){
            imgs[i].setAttribute('src', imgs[i].getAttribute(src_device));
        }
    }

    // for ( let element in data_styles ){
    //     console.log( element );
    //     if(element.getAttribute(device) != null ){
    //         console.log(element);
    //         element.style.backgroundImage = "url("+element.getAttribute(device)+")";
    //     }
    // }

    for(let i = 0; i < data_styles.length; i++){
        if(data_styles[i].getAttribute(device) != null ){
        
            console.log(data_styles[i]);
            data_styles[i].style.backgroundImage = "url("+data_styles[i].getAttribute(device)+")";
            
        }
    }
    // console.log( 'Testando final função' );

}




