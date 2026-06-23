const {
registerBlockType
}=wp.blocks;


const {

RichText,
MediaUpload,
InspectorControls

}=wp.blockEditor;



const {

Button,
PanelBody,
SelectControl

}=wp.components;




registerBlockType(
'fitlife/program-block',
{


edit:({attributes,setAttributes})=>{


return (

<>

<InspectorControls>


<PanelBody title="Difficulty">


<SelectControl

value={attributes.difficulty}

options={[
{
label:"Easy",
value:"Easy"
},

{
label:"Medium",
value:"Medium"
},

{
label:"Hard",
value:"Hard"
}

]}


onChange={
(value)=>
setAttributes({
difficulty:value
})
}


/>


</PanelBody>


</InspectorControls>



<div>


<MediaUpload

onSelect={
(img)=>
setAttributes({
image:img.url
})
}

render={({open})=>(

<Button onClick={open}>

Select Image

</Button>

)}

/>




<RichText

tagName="h2"

value={attributes.title}

onChange={
(value)=>
setAttributes({
title:value
})
}


/>



<RichText

tagName="p"

value={attributes.description}

onChange={
(value)=>
setAttributes({
description:value
})
}


/>



<input

placeholder="Button URL"

value={attributes.buttonUrl}

onChange={
(e)=>
setAttributes({
buttonUrl:e.target.value
})
}

/>


</div>


</>


)


},



save:()=>null



}

);