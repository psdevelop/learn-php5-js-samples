/***********************
* Adobe Edge Composition Actions
*
* Edit this file with caution, being careful to preserve 
* function signatures and comments starting with 'Edge' to maintain the 
* ability to interact with these actions from within Adobe Edge
*
***********************/
(function($, Edge, compId){
var Composition = Edge.Composition, Symbol = Edge.Symbol; // aliases for commonly used Edge classes

//Edge symbol: 'stage'
(function(symbolName) {










Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 3000, function(sym, e) {
// insert code here
sym.play("StartRotate");

});
//Edge binding end


})("stage");
//Edge symbol end:'stage'

//=========================================================

//Edge symbol: 'Letter1'
(function(symbolName) {


})("Letter1");
//Edge symbol end:'Letter1'

//=========================================================

//Edge symbol: 'MoveObject'
(function(symbolName) {
Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 3000, function(sym, e) {
// insert code here
sym.play("RotateBant");

});
//Edge binding end


})("MoveObject");
//Edge symbol end:'MoveObject'

//=========================================================

//Edge symbol: 'MoveArea'
(function(symbolName) {
Symbol.bindElementAction(compId, symbolName, "${_MObjWithShad}", "dblclick", function(sym, e) {
// insert code for mouse double click here
sym.play(0);

});
//Edge binding end


})("MoveArea");
//Edge symbol end:'MoveArea'

//=========================================================

//Edge symbol: 'MObjWithShad'
(function(symbolName) {
Symbol.bindTriggerAction(compId, symbolName, "Default Timeline", 1000, function(sym, e) {
// insert code here
sym.playReverse();

});
//Edge binding end

Symbol.bindElementAction(compId, symbolName, "${_WithShadowObj}", "click", function(sym, e) {
// insert code for mouse clicks here
sym.play();

});
//Edge binding end


})("MObjWithShad");
//Edge symbol end:'MObjWithShad'

//=========================================================

//Edge symbol: 'WithShadowObj'
(function(symbolName) {

})("WithShadowObj");
//Edge symbol end:'WithShadowObj'

})(jQuery, AdobeEdge, "EDGE-1815503");