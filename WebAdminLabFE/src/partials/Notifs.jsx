import React from "react";
import styled from "styled-components";

const Notifs = ({display}) => {
    return (
        <StyledWrapper>
            <div className="notif">
                <p>{display}</p>
            </div>
        </StyledWrapper>
    );
    }

const StyledWrapper = styled.div`
    .notif p
    {
    font-size: 0.8rem;
    padding: 0.2rem 0.5rem;
    border-radius: 0.5rem;
    font-weight: 600;
    border: 1px solid var(--grey);
    background-color: var(--lightgrey);
    }
`;

export default Notifs;