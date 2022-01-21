import{o as a,d,e,k as r,v as c,F as m,i as b,n as f}from"./vendor.20d4d45b.js";import{_ as h}from"./index.87028035.js";const v={props:{question:{type:Object,required:!0},onremove:{type:Function,required:!0}},setup(t){function s(){const i=Date.now().toString()+Math.random().toString();t.question.choices.push({id:i,label:""})}function u(i){t.question.answer=i}function o(i){const n=t.question.choices.findIndex(l=>l.id===i);t.question.answer===i&&(t.question.answer="NONE"),t.question.choices.splice(n,1)}function _(){t.onremove(t.question.id)}return{question:t.question,addChoice:s,selectChoice:u,removeChoice:o,removeQuestion:_}}},q={class:"card mb-4"},C={class:"card-body"},x={class:"form-group mb-2"},g=e("label",null,"Label",-1),k={class:"d-flex"},y=e("i",{class:"far fa-trash-alt"},null,-1),w=[y],p={class:"form-group mb-2"},E=e("label",null,"Earnings",-1),V={class:"form-group"},Q=e("label",null,"Choices",-1),U={class:"d-flex flex-nowrap mb-2"},j=["onUpdate:modelValue"],A=["onClick"],B={key:0,class:"far fa-check-square"},F={key:1,class:"far fa-square"},N=["onClick"],D=e("div",{class:"far fa-trash-alt"},null,-1),L=[D];function M(t,s,u,o,_,i){return a(),d("div",q,[e("div",C,[e("div",x,[g,e("div",k,[r(e("input",{type:"text",class:"form-control","onUpdate:modelValue":s[0]||(s[0]=n=>o.question.label=n),placeholder:"Enter question label"},null,512),[[c,o.question.label]]),e("button",{class:"btn btn-danger ms-2",onClick:s[1]||(s[1]=(...n)=>o.removeQuestion&&o.removeQuestion(...n))},w)])]),e("div",p,[E,r(e("input",{min:"0",type:"number",class:"form-control","onUpdate:modelValue":s[2]||(s[2]=n=>o.question.earnings=n)},null,512),[[c,o.question.earnings]])]),e("div",V,[Q,(a(!0),d(m,null,b(o.question.choices,n=>(a(),d("div",U,[r(e("input",{type:"text",class:f(["form-control me-2",o.question.answer==n.id?"selected-choice":""]),"onUpdate:modelValue":l=>n.label=l,placeholder:"Enter choice label"},null,10,j),[[c,n.label]]),e("button",{class:"btn btn-info me-2",onClick:l=>o.selectChoice(n.id)},[n.id===o.question.answer?(a(),d("i",B)):(a(),d("i",F))],8,A),e("button",{class:"btn btn-danger me",onClick:l=>o.removeChoice(n.id)},L,8,N)]))),256)),e("button",{class:"btn btn-secondary text-center w-100 mt-2",onClick:s[3]||(s[3]=(...n)=>o.addChoice&&o.addChoice(...n))},"Add a choice")])])])}var z=h(v,[["render",M]]);export{z as A};