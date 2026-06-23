const {
registerBlockType
}=wp.blocks;


const {

SelectControl

}=wp.components;



registerBlockType(
'fitlife/trainer-block',
{


edit:({attributes,setAttributes})=>{


const trainers =
wp.apiFetch({

path:'/fitlife/v1/trainers'

});



return (

<SelectControl


label="Select Trainer"


value={
attributes.trainerId
}


options={[

{
label:"Select",
value:""
}

]}



onChange={
(value)=>
setAttributes({
trainerId:value
})
}


/>

)


},



save:()=>null


}

);