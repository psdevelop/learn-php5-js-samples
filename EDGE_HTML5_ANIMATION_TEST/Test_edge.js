/**
 * Adobe Edge: symbol definitions
 */
(function($, Edge, compId){
var fonts = {
};
var symbols = {
"stage": {
   version: "0.1.4",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: true,
   content: {
      dom: [
        {
            id:'stain_back2',
            type:'image',
            rect:[0,0,200,1200],
            fill:['rgba(0,0,0,0)','images/stain_back2.jpg']
        },
        {
            id:'MoveArea2',
            type:'rect',
            rect:[10,17,0,0]
        }],
      symbolInstances: [
      {
         id:'MoveArea2',
         symbolName:'MoveArea'
      }
      ]
   },
   states: {
      "Base State": {
         "${_stain_back2}": [
            ["transform", "translateY", '-600px']
         ],
         "${_stage}": [
            ["style", "height", '400px'],
            ["color", "background-color", 'rgba(255,255,255,1)'],
            ["style", "width", '550px']
         ],
         "body": [
            ["color", "background-color", 'rgba(0,0,0,0)']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 3000,
         autoPlay: true,
         labels: {
            "StartRotate": 0
         },
         timeline: [
            { id: "eid5", tween: [ "transform", "${_stain_back2}", "translateY", '0px', { fromValue: '-600px'}], position: 0, duration: 3000, easing: "easeInOutQuad" }         ]
      }
   }
},
"Letter1": {
   version: "0.1.4",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: true,
   content: {"dom":[{"id":"Text2","className":"symbolStage_Letter1_Text2_id","type":"text","rect":[-76,1,0,0],"text":"T","align":"auto","font":["'Arial Black', Gadget, sans-serif",80,"rgba(0,0,0,1)","normal","none","normal"],"transform":[[76,-1]]}],"symbolInstances":[]},
   states: {
      "Base State": {
         "${_Text2}": [
            ["transform", "translateY", '-1px'],
            ["transform", "translateX", '76px'],
            ["style", "font-size", '80px']
         ],
         "${symbolSelector}": [
            ["style", "height", '113px'],
            ["style", "width", '58px']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 1500,
         autoPlay: false,
         labels: {

         },
         timeline: [
         ]
      }
   }
},
"MoveObject": {
   version: "0.1.4",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: true,
   content: {
   dom: [
   {
       id:'red_bant_small2',
       className:'symbolStage_MoveObject_red_bant_small2_id',
       type:'image',
       rect:[-55,-207,90,90],
       fill:['rgba(0,0,0,0)','images/red_bant_small2.png']
   }],
   symbolInstances: [

   ]
},
   states: {
      "Base State": {
         "${_red_bant_small2}": [
            ["transform", "translateX", '55px'],
            ["transform", "translateY", '207px'],
            ["transform", "rotateZ", '0deg']
         ],
         "${symbolSelector}": [
            ["style", "height", '90px'],
            ["style", "width", '90px']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 3000,
         autoPlay: true,
         labels: {
            "RotateBant": 0
         },
         timeline: [
            { id: "eid12", tween: [ "transform", "${_red_bant_small2}", "rotateZ", '360deg', { fromValue: '0deg'}], position: 0, duration: 3000 },
            { id: "eid6", tween: [ "transform", "${_red_bant_small2}", "translateX", '55px', { fromValue: '55px'}], position: 3000, duration: 0 },
            { id: "eid7", tween: [ "transform", "${_red_bant_small2}", "translateY", '207px', { fromValue: '207px'}], position: 3000, duration: 0 }         ]
      }
   }
},
"MoveArea": {
   version: "0.1.4",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: true,
   content: {
   dom: [
   {
       id:'Rectangle',
       className:'symbolStage_MoveArea_Rectangle_id',
       type:'rect',
       rect:[234,76,160,159],
       fill:['rgba(0,0,0,0)',null],
       stroke:[0,"","none"]
   },
   {
       id:'MObjWithShad',
       className:'symbolStage_MoveArea_MObjWithShad_id',
       type:'rect',
       rect:[25.99999,190,0,0]
   }],
   symbolInstances: [
   {
      id:'MObjWithShad',
      symbolName:'MObjWithShad'
   }
   ]
},
   states: {
      "Base State": {
         "${symbolSelector}": [
            ["style", "height", '360px'],
            ["style", "width", '179px']
         ],
         "${_MObjWithShad}": [
            ["transform", "translateX", '0px'],
            ["transform", "translateY", '0px']
         ],
         "${_Rectangle}": [
            ["style", "height", '463px'],
            ["transform", "translateY", '-76px'],
            ["transform", "translateX", '-234px'],
            ["style", "width", '179px']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 3500,
         autoPlay: false,
         labels: {

         },
         timeline: [
            { id: "eid17", tween: [ "transform", "${_Rectangle}", "translateY", '-76px', { fromValue: '-76px'}], position: 3000, duration: 0 },
            { id: "eid20", tween: [ "transform", "${_Rectangle}", "translateX", '-234px', { fromValue: '-234px'}], position: 3000, duration: 0 },
            { id: "eid41", tween: [ "transform", "${_MObjWithShad}", "translateY", '-113px', { fromValue: '0px'}], position: 0, duration: 1000, easing: "easeInOutSine" },
            { id: "eid43", tween: [ "transform", "${_MObjWithShad}", "translateY", '160px', { fromValue: '-113px'}], position: 1000, duration: 1500, easing: "easeInOutSine" },
            { id: "eid47", tween: [ "transform", "${_MObjWithShad}", "translateY", '-40px', { fromValue: '160px'}], position: 2500, duration: 1000, easing: "easeInOutSine" },
            { id: "eid40", tween: [ "transform", "${_MObjWithShad}", "translateX", '49px', { fromValue: '0px'}], position: 0, duration: 1000, easing: "easeInOutSine" },
            { id: "eid42", tween: [ "transform", "${_MObjWithShad}", "translateX", '-14px', { fromValue: '49px'}], position: 1000, duration: 1500, easing: "easeInOutSine" },
            { id: "eid46", tween: [ "transform", "${_MObjWithShad}", "translateX", '0px', { fromValue: '-14px'}], position: 2500, duration: 1000, easing: "easeInOutSine" },
            { id: "eid21", tween: [ "style", "${_Rectangle}", "width", '179px', { fromValue: '179px'}], position: 3000, duration: 0 }         ]
      }
   }
},
"MObjWithShad": {
   version: "0.1.4",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: true,
   content: {
   dom: [
   {
       id:'shadow32',
       className:'symbolStage_MoveArea_shadow32_id',
       type:'image',
       rect:[-25.99999,-190,90,90],
       fill:['rgba(0,0,0,0)','images/shadow32.png'],
       transform:[[20.99959,197.99959],,,[0.88888,0.88888]]
   },
   {
       id:'WithShadowObj',
       className:'symbolStage_MObjWithShad_WithShadowObj_id',
       type:'rect',
       rect:[14,0,0,0]
   }],
   symbolInstances: [
   {
      id:'WithShadowObj',
      symbolName:'WithShadowObj'
   }
   ]
},
   states: {
      "Base State": {
         "${_shadow32}": [
            ["transform", "scaleX", '0.88888'],
            ["transform", "translateX", '20.99959px'],
            ["transform", "scaleY", '0.88888'],
            ["transform", "translateY", '197.99959px']
         ],
         "${symbolSelector}": [
            ["style", "height", '92.999188px'],
            ["style", "width", '104.00001px']
         ],
         "${_WithShadowObj}": [
            ["transform", "scaleX", '1'],
            ["transform", "scaleY", '1'],
            ["transform", "translateY", '0px'],
            ["transform", "translateX", '0px']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 1000,
         autoPlay: false,
         labels: {

         },
         timeline: [
            { id: "eid32", tween: [ "transform", "${_shadow32}", "scaleX", '0.55555', { fromValue: '0.88888'}], position: 0, duration: 1000 },
            { id: "eid33", tween: [ "transform", "${_shadow32}", "scaleY", '0.55555', { fromValue: '0.88888'}], position: 0, duration: 1000 },
            { id: "eid31", tween: [ "transform", "${_shadow32}", "translateY", '182.99974px', { fromValue: '197.99959px'}], position: 0, duration: 1000 },
            { id: "eid26", tween: [ "transform", "${_WithShadowObj}", "translateX", '14.99984px', { fromValue: '0px'}], position: 0, duration: 1000 },
            { id: "eid30", tween: [ "transform", "${_shadow32}", "translateX", '5.99974px', { fromValue: '20.99959px'}], position: 0, duration: 1000 },
            { id: "eid28", tween: [ "transform", "${_WithShadowObj}", "scaleX", '1.33333', { fromValue: '1'}], position: 0, duration: 1000 },
            { id: "eid29", tween: [ "transform", "${_WithShadowObj}", "scaleY", '1.33333', { fromValue: '1'}], position: 0, duration: 1000 },
            { id: "eid27", tween: [ "transform", "${_WithShadowObj}", "translateY", '14.99985px', { fromValue: '0px'}], position: 0, duration: 1000 }         ]
      }
   }
},
"WithShadowObj": {
   version: "0.1.4",
   baseState: "Base State",
   initialState: "Base State",
   gpuAccelerate: true,
   content: {
   dom: [
   {
       id:'MoveObject',
       className:'symbolStage_MoveArea_MoveObject_id',
       type:'rect',
       rect:[5.00001,0,0,0]
   }],
   symbolInstances: [
   {
      id:'MoveObject',
      symbolName:'MoveObject'
   }
   ]
},
   states: {
      "Base State": {
         "${symbolSelector}": [
            ["style", "height", '90px'],
            ["style", "width", '90px']
         ],
         "${_MoveObject}": [
            ["transform", "translateX", '-5px']
         ]
      }
   },
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 3000,
         autoPlay: true,
         labels: {

         },
         timeline: [
            { id: "eid15", tween: [ "transform", "${_MoveObject}", "translateX", '-5px', { fromValue: '-5px'}], position: 3000, duration: 0 }         ]
      }
   }
}
};

Edge.registerCompositionDefn(compId, symbols, fonts);

/**
 * Adobe Edge DOM Ready Event Handler
 */
$(window).ready(function() {
     Edge.launchComposition(compId);
});
})(jQuery, AdobeEdge, "EDGE-1815503");
