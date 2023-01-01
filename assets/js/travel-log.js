/*************************************
*  Travel-Log.Js                     
*                                  
*  Created by Ferdy Rahmat R.      
*  on 5 April 2022                
*                                  
*************************************/
document.title = "PeduliDiri - Catatan Perjalanan";

var instance = $('#loadDataTravel').scheletrone({
    url: "data-travel",
    debug: {
        latency: 2000
    }
})
