var express = require("express");
var router = express.Router();
const axios = require("axios");

/* GET home page. */
router.post("/refer/testconnectapi/", function (req, resJson, next) {
  // console.log(keyTokenHis)

  let cid = "";
  let hn = "";
  const headderApi = `${req.body.headAuthHis}`;
  const hospCode = req.body.hospCode;
  if (req.body.cid != "") {
    cid = req.body.cid;
  } else {
    cid = null;
  }
  if (req.body.hn != "") {
    hn = req.body.hn;
  } else {
    hn = null;
  }

  axios
    .post(
      `${req.body.urlTokenHis}${req.body.testConnect}`,
      {
        hospcode: hospCode,
        cid: cid,
        hn: hn,
      },
      {
        headers: {
          [headderApi]: `${req.body.keyTokenHis}`,
        },
      }
    )
    .then((res) => {
      resJson.send(res.data);
    })
    .catch((error) => {
      console.error(error);
    });
});

router.post("/refer/api/", async function (req, resJson, next) {
  // console.log(keyTokenHis)
  let cid = "";
  let hn = "";
  const headderApi = `${req.body.headAuthHis}`;
  const hospCode = req.body.hospCode;

  if (req.body.patien) {
    if (req.body.hn.length == 13) {
      cid = req.body.hn;
      hn = null;
    } else if (req.body.hn != "" || req.body.hn.length < 13) {
      hn = req.body.hn;
      cid = null;
    }

    const resPatien = await axios
      .post(
        `${req.body.urlTokenHis}${req.body.patien}`,
        {
          hospcode: hospCode,
          cid: cid,
          hn: hn,
        },
        {
          headers: {
            [headderApi]: `${req.body.keyTokenHis}`,
          },
        }
      )
      .then((res) => {
        return res.data;
      })
      .catch((error) => {
        return console.error(error);
      });
    resJson.send(resPatien);
  } else if (req.body.vstDate) {
    const resVsDate = await axios
      .post(
        `${req.body.urlTokenHis}${req.body.vstDate}`,
        {
          hospcode: req.body.hospCode,
          hn: req.body.hn,
          eventTypeName: req.body.eventTypeName,
        },
        {
          headers: {
            [headderApi]: `${req.body.keyTokenHis}`,
          },
        }
      )
      .then((res) => {
        return res.data;
      })
      .catch((error) => {
        return console.error(error);
      });
    resJson.send(resVsDate);
  } else if (req.body.typeDetail) {
    let TypeDate = "";
    let resDetail;
    if (req.body.typeDetail == "Drugs") {
      resDetail = await axios
        .post(
          `${req.body.urlTokenHis}${req.body.pathDetail}`,
          {
            hospcode: 10661,
            hn: req.body.hn,
            drugDate: req.body.detailDate,
            type: "opd",
          },
          {
            headers: {
              "x-api-key": `pvoNArKhGdKK9oDl@fTSsDjG8XzptHlxIXR!3JRjzUJhDRbkalaWD`,
            },
          }
        )
        .then((res) => {
                 return {
                   date: req.body.detailDate,
                   type: req.body.typeDetail,
                   optimerece: res.data.drug,
                 };
        })
        .catch((error) => {
          return console.error(error);
        });
      console.log(resDetail);
    } else if (req.body.typeDetail == "Labs") {
      resDetail = await axios
        .post(
          `${req.body.urlTokenHis}${req.body.pathDetail}`,
          {
            hospcode: 10661,
            hn: req.body.hn,
            labDate: req.body.detailDate,
            type: 1,
          },
          {
            headers: {
              "x-api-key": `pvoNArKhGdKK9oDl@fTSsDjG8XzptHlxIXR!3JRjzUJhDRbkalaWD`,
            },
          }
        )
        .then((res) => {
        
          return {date:req.body.detailDate, type: req.body.typeDetail, data: res.data.lab };
        })
        .catch((error) => {
          return console.error(error);
        });
    }
 console.log(resDetail);
    resJson.send(resDetail);
  }
});

module.exports = router;
