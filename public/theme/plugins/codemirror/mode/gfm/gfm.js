(function(mod){if(typeof exports=="object"&&typeof module=="object")
mod(require("../../lib/codemirror"),require("../markdown/markdown"),require("../../addon/mode/overlay"));else if(typeof define=="function"&&define.amd)
define(["../../lib/codemirror","../markdown/markdown","../../addon/mode/overlay"],mod);else
mod(CodeMirror);})(function(CodeMirror){"use strict";CodeMirror.defineMode("gfm",function(config,modeConfig){var codeDepth=0;function blankLine(state){state.code=false;return null;}
var gfmOverlay={startState:function(){return{code:false,codeBlock:false,ateSpace:false};},copyState:function(s){return{code:s.code,codeBlock:s.codeBlock,ateSpace:s.ateSpace};},token:function(stream,state){if(state.codeBlock){if(stream.match(/^```/)){state.codeBlock=false;return null;}
stream.skipToEnd();return null;}
if(stream.sol()){state.code=false;}
if(stream.sol()&&stream.match(/^```/)){stream.skipToEnd();state.codeBlock=true;return null;}
if(stream.peek()==='`'){stream.next();var before=stream.pos;stream.eatWhile('`');var difference=1+ stream.pos- before;if(!state.code){codeDepth=difference;state.code=true;}else{if(difference===codeDepth){state.code=false;}}
return null;}else if(state.code){stream.next();return null;}
if(stream.eatSpace()){state.ateSpace=true;return null;}
if(stream.sol()||state.ateSpace){state.ateSpace=false;if(stream.match(/^(?:[a-zA-Z0-9\-_]+\/)?(?:[a-zA-Z0-9\-_]+@)?(?:[a-f0-9]{7,40}\b)/)){return"link";}else if(stream.match(/^(?:[a-zA-Z0-9\-_]+\/)?(?:[a-zA-Z0-9\-_]+)?#[0-9]+\b/)){return"link";}}
if(stream.match(/^((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]|\([^\s()<>]*\))+(?:\([^\s()<>]*\)|[^\s`!()\[\]{};:'".,<>?«»“”‘’]))/i)&&stream.string.slice(stream.start- 2,stream.start)!="]("){return"link";}
stream.next();return null;},blankLine:blankLine};var markdownConfig={underscoresBreakWords:false,taskLists:true,fencedCodeBlocks:true};for(var attr in modeConfig){markdownConfig[attr]=modeConfig[attr];}
markdownConfig.name="markdown";CodeMirror.defineMIME("gfmBase",markdownConfig);return CodeMirror.overlayMode(CodeMirror.getMode(config,"gfmBase"),gfmOverlay);},"markdown");});