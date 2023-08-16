export default function Image({ block }) {
    console.log(block)

    return (
        <>
            {/* <div className="col-md-3 mt-5" >
                <div className="coverImage" style={{ height: "200px" }}>
                    <img className="itemImage" style={{ height: "100%", width: "100%", objectFit: "cover" }}
                        src={(block.status && block.status === 'upload') ? block.file : 'http://localhost/block_demo/wp-content/uploads/' + block.file} />
                    <div onClick={() => handeDelete(block.id)} className="coverIcon">
                        <FontAwesomeIcon icon={faTrash} />
                    </div>
                </div>
            </div> */}
            <h1>{JSON.stringify(block)}</h1>
        </>
    )
}