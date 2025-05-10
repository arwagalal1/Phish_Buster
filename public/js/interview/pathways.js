document.addEventListener('DOMContentLoaded', function () {
  let selectedPath = null;
  let selectedSubPath = null;

  // Select path elements
  const paths = document.querySelectorAll('#soc, #malware-analysis, #pen-test, #redTeaming');
  const subOptionsContainer = document.getElementById('sub-options');
  const submitButton = document.getElementById('submit-button');

  paths.forEach(path => {
    path.addEventListener('click', function () {
      paths.forEach(p => p.classList.remove('selected'));
      this.classList.add('selected');
      selectedPath = this.id;

      if (selectedPath === 'pen-test') {
        subOptionsContainer.classList.remove('hidden');
      } else {
        subOptionsContainer.classList.add('hidden');
        selectedSubPath = null;
      }
    });
  });

  // Select sub-path for pen-test
  const subOptions = subOptionsContainer.querySelectorAll('button');
  subOptions.forEach(option => {
    option.addEventListener('click', function () {
      subOptions.forEach(o => o.classList.remove('selected')); // Reverted to use 'selected' class
      this.classList.add('selected'); // Reverted to use 'selected' class
      selectedSubPath = this.textContent.trim();
    });
  });

  // Submit button
  submitButton.addEventListener('click', function () {
    if (!selectedPath) {
      alert('Please select a path.');
      return;
    }

    if (selectedPath === 'pen-test' && !selectedSubPath) {
      alert('Please select a sub-path for Penetration Testing.');
      return;
    }

    const subPathMapping = {
      'Web Application': 'web',
      'Mobile Application': 'mobile',
      'Network': 'network',
    };

    const queryParams = new URLSearchParams();
    queryParams.append('path', selectedPath);
    if (selectedSubPath) {
      queryParams.append('subPath', subPathMapping[selectedSubPath]);
    }

    window.location.href = `/api/questions?${queryParams.toString()}`;
  });
});