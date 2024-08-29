#banner {
    background-color: rgb(0, 59, 92);
    font-family: 'Courier New', Courier, monospace;
    height: 130px;
}


.minerva{
    width: 80px;
    height: 80px;
    position:absolute;
    right: 1%;
    top: 3%;
}

.lns-logo{
    width: 170px;
    height: 60px;
    position:absolute;
    left: 1%;
    top: 3.5%;
}



@media only screen and (max-width: 700px){
    #lns-logo{
        width:140px;
        height: 60;
    }
}

#botones{
    background-color: rgb(0, 181, 226);
    color: rgb(255, 255, 255);
    margin-top: 10px;
    line-height: 20px;
    width: 200px;   
    margin-top: 20px;
}

#botones_desp{
    background-color: rgb(68, 160, 221);
    color: rgb(255, 255, 255);
    margin-top: 10px;
    line-height: 20px;
    width: 200px;   
    margin-top: 20px;
}

.contenedoruno{
    
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.contenedordos{
    display: flex;
    flex-direction: column;
    align-items: center;
}

.grupo-boton{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.txt-title{
    text-align: center;
    padding: 0.75em 0;
    letter-spacing: 0.075rem;
    line-height: 1.25;
    text-shadow: #333 2px 2px 2px;
    color: rgb(0, 59, 92);
    font-family: "Roboto Condensed", sans-serif;
    font-weight: 600;
    font-style:normal;
    font-size: clamp(1rem, -0.875rem + 8.333vw, 2.5rem);
    
}

.sub-title{
    text-align: center;
    padding: 0.75em 0;
    letter-spacing: 0.075rem;
    line-height: 1.25;
    /* text-shadow: #333 2px 2px 2px; */
    color: rgb(0, 59, 92);
    font-family: "Roboto Condensed", sans-serif;
    font-weight: 600;
    font-style:normal;
    font-size: clamp(1rem, -0.875rem + 8.333vw, 1.7rem);
    
}

.hr1{
    border-left: thick solid rgba(0, 0, 0,0.05);
    height:75.1vh;
    left: 38%;
    width: 0.5vh;
    position: absolute;
    top: 32.3%;
    transform: translateY(-20%);
   }

.hr2{
    border-left: thick solid rgba(0, 0, 0, 0.05);
    height:75.1vh;
    right: 38%;
    width: 0.5vh;
    position: absolute;
    top: 32.3%;
    transform: translateY(-20%);
}


html, body {
    height: 100%;
}
body {
    display: flex;
    flex-direction: column;
}
.content {
    flex: 1 0 auto;
}

footer {
    flex-shrink: 0;
}
