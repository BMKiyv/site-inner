console.log('from login.js');

let links = document.querySelectorAll('.links');

    window.addEventListener('load',(e)=>{
        let location = document.location.href  
        for (let item of links){

        if (item.href==location){
            console.log(item.href,location);
            item.classList.add('current') 

        }
        else if(item.href!=location){
            item.classList.remove('current')
        }
    }
    })
