var express = require('express');
var router = express.Router();
const axios = require('axios');

/* GET home page. */
router.post('/refer/testconnectapi/', function(req, resJson, next) {
    // console.log(keyTokenHis)

    let cid = '' ;
    let hn = '';
    const headderApi = `${req.body.headAuthHis}`
    const hospCode = req.body.hospCode
    if(req.body.cid !=""){
        cid = req.body.cid
    }else{
        cid =null;
    }
    if(req.body.hn !=""){
        hn =req.body.hn
        
    }else{
        hn =null
    }
    console.log(`${req.body.urlTokenHis}${req.body.testConnect}`);
  
    axios.post(`${req.body.urlTokenHis}${req.body.testConnect}`,{
        hospcode: hospCode,
        cid: cid,
        hn: hn
      }, {
        headers: {
            [headderApi]: `${req.body.keyTokenHis}` 
        }
      }).then((res) => {
        resJson.send(res.data);
      })
      .catch((error) => {
        console.error(error)
      })

    
   
});

router.post('/refer/api/', function(req, resJson, next) {
    // console.log(keyTokenHis)

    let cid = '' ;
    let hn = '';
    const headderApi = `${req.body.headAuthHis}`
    const hospCode = req.body.hospCode

    if (req.body.hn.length == 13) {
      cid = req.body.hn;
      hn = null;
    } else if (req.body.hn != "" || req.body.hn.length < 13) {
      hn = req.body.hn;
      cid = null;
    }
   
    axios.post(`${req.body.urlTokenHis}`,{
        hospcode: hospCode,
        cid: cid,
        hn: hn
      }, {
        headers: {
            [headderApi]: `${req.body.keyTokenHis}` 
        }
      }).then((res) => {
        resJson.send(res.data);
      })
      .catch((error) => {
        console.error(error)
      })
console.log(hn);
    
   
});

module.exports = router;
