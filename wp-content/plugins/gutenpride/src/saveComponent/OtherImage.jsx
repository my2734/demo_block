export default function OtherImage({blocks}){
    console.log(blocks)
    console.log(blocks.lenght)
    
    // blocks.forEach(block => {
    //     console.log(block)
    // });
    // console.log(typeof blocks)
    return (
        <div>
            {/* {blocks.map()} */}
            <h1>{blocks.lenght}</h1>
            <h1>hello ca nha yeu cua ken</h1>
        </div>
    )
}