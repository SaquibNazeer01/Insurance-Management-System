// Chatbot Responses (JSON)
const chatbotResponses = {
    "questions": [
      {
        "question": "What is my policy coverage?",
        "answer": "Your policy covers liability, collision, and comprehensive damage. For more details, please check your policy document."
      },
      {
        "question": "How do I file a claim?",
        "answer": "You can file a claim by logging into your account and navigating to the 'Claims' section. Alternatively, you can call our support team."
      },
      {
        "question": "What is the status of my claim?",
        "answer": "To check the status of your claim, please provide your claim ID. You can find it in your claims dashboard."
      },
      {
        "question": "How do I update my contact information?",
        "answer": "You can update your contact information by logging into your account and visiting the 'Profile' section."
      },
      {
        "question": "What are your working hours?",
        "answer": "Our support team is available from 9 AM to 6 PM, Monday to Friday."
      },
      {
        "question": "How do I renew my policy?",
        "answer": "You can renew your policy by logging into your account and visiting the 'Renew Policy' section. You can also call us for assistance."
      },
      {
        "question": "What documents are required to file a claim?",
        "answer": "You will need your policy number, a copy of the incident report, and any relevant photos or receipts."
      },
      {
        "question": "How do I contact customer support?",
        "answer": "You can contact our customer support team at 1-800-123-4567 or email us at support@insurance.com."
      },
      {
        "question": "What is the premium amount for my policy?",
        "answer": "Your premium amount is listed in your policy document. You can also check it in the 'Policy Details' section of your account."
      },
      {
        "question": "Can I cancel my policy?",
        "answer": "Yes, you can cancel your policy by contacting our support team. Please note that cancellation fees may apply."
      },
      {
        "question": "How do I download my policy document?",
        "answer": "You can download your policy document by logging into your account and visiting the 'Policy Documents' section."
      },
      {
        "question": "What is the process for claim approval?",
        "answer": "Once you file a claim, our team will review it and contact you within 5-7 business days with an update."
      }
    ]
  };
  
  // Chatbot Logic
  document.addEventListener('DOMContentLoaded', () => {
    const chatbotMessages = document.getElementById('chatbot-messages');
    const chatbotInput = document.getElementById('chatbot-input');
    const chatbotSendBtn = document.getElementById('chatbot-send-btn');
    const chatbotQuestionList = document.getElementById('chatbot-question-list');
  
    // Show welcome message
    appendMessage("Hello! I'm your insurance assistant. How can I help you today?", 'bot');
  
    // Display predefined questions
    chatbotResponses.questions.forEach((q, index) => {
      const listItem = document.createElement('li');
      listItem.textContent = `${index + 1}. ${q.question}`;
      listItem.addEventListener('click', () => {
        appendMessage(q.question, 'user');
        appendMessage(q.answer, 'bot');
      });
      chatbotQuestionList.appendChild(listItem);
    });
  
    // Send Message
    chatbotSendBtn.addEventListener('click', () => {
      const userMessage = chatbotInput.value.trim();
      if (userMessage) {
        appendMessage(userMessage, 'user');
        const botResponse = getBotResponse(userMessage);
        appendMessage(botResponse, 'bot');
        chatbotInput.value = '';
      }
    });
  
    // Append Message to Chat
    function appendMessage(message, sender) {
      const messageElement = document.createElement('div');
      messageElement.classList.add('chatbot-message', sender);
      messageElement.textContent = message;
      chatbotMessages.appendChild(messageElement);
      chatbotMessages.scrollTop = chatbotMessages.scrollHeight; // Auto-scroll
    }
  
    // Get Bot Response
    function getBotResponse(userMessage) {
      // Check if the user asks for help
      if (userMessage.toLowerCase() === "help") {
        return getHelpMessage();
      }
  
      // Find a matching question
      const question = chatbotResponses.questions.find(q => q.question.toLowerCase() === userMessage.toLowerCase());
      return question ? question.answer : "I'm here to help! Type 'help' to see a list of questions I can answer.";
    }
  
    // Generate Help Message
    function getHelpMessage() {
      let helpMessage = "Here are some questions I can help with:\n";
      chatbotResponses.questions.forEach((q, index) => {
        helpMessage += `${index + 1}. ${q.question}\n`;
      });
      return helpMessage;
    }
  });