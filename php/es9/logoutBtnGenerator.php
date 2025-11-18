<?php
function generateLogout(): void
{
    echo '<div>
            <a href="logout.php">
                <button style="background-color: #e0331c;
                                color: white;
                                padding: 10px 20px;
                                border: none;
                                border-radius: 5px;
                                cursor: pointer;
                                font-size: 16px;
                                display: block;
                                margin-top: 20px;
                                position: absolute;
                                bottom: 20px;
                                right: 20px;">
                    Logout
                </button>
            </a>
        </div>';
}

?>