import React, { useState } from 'react';
import PropTypes from 'prop-types';
import styled from 'styled-components';

const Tabs = ({ tabs, onTabChange }) => {
  const [activeTab, setActiveTab] = useState(tabs[0].id);

  const handleTabChange = (tabId) => {
    setActiveTab(tabId);
    onTabChange(tabId);
  };

  return (
    <StyledWrapper>
      <div className="tabs">
        {tabs.map((tab) => (
          <button
            key={tab.id}
            onClick={() => handleTabChange(tab.id)}
            className={activeTab === tab.id ? 'tab-button active' : 'tab-button'}
          >
            {tab.label}
          </button>
        ))}
      </div>
    </StyledWrapper>
  );
};

Tabs.propTypes = {
  tabs: PropTypes.arrayOf(
    PropTypes.shape({
      id: PropTypes.string.isRequired,
      label: PropTypes.string.isRequired,
    })
  ).isRequired,
  onTabChange: PropTypes.func.isRequired,
};

const StyledWrapper = styled.div`
  .tabs {
  display: flex;
}

.tab-button {
  border: none;
  padding: 1rem 1.5rem;
  color: var(--darkgrey);
  background-color: var(--primary);
  font-size: 0.8rem;
}

.tab-button.active {
  color: var(--secondary);
  font-weight: bold;
  border-bottom: var(--secondary) 2px solid;
  transition: 0.3s ease-in-out;
}

.tab-button:not(.active):hover {
  color: var(--secondary);
  cursor: pointer;
}
`;

export default Tabs;