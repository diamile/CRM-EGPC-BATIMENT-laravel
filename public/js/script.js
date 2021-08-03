const button = document.getElementById('button');
button.addEventListener('click',()=>{
    const body = document.getElementById('tbody');
    const tr = document.createElement('tr');
    
    for(var i=0;i<4;i++){
        const td = document.createElement('td');
        const input = document.createElement('input');
        input.setAttribute('type','text');
        const test = document.getElementsByTagName('td');
        console.log('test',test)
        if(i==0){
            input.setAttribute('name','designation')
        }else if(i==1){
            input.setAttribute('name','quantity')
        }else if(i==2){
            input.setAttribute('name','prix-total')
        }else if(i==3){
            input.setAttribute('name','prix-unitaire')
        }
       
        td.appendChild(input);

        tr.appendChild(td)


    }
    body.appendChild(tr);

    

    
})