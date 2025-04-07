from sklearn.ensemble import RandomForestClassifier
from sklearn.preprocessing import StandardScaler
import pandas as pd
import numpy as np
from flask import Flask, request, jsonify
import pickle

app = Flask(__name__)

# Improved simulated data (more balanced and varied)
data = pd.DataFrame({
    'amount': [50, 200, 300, 1500, 25, 5000, 75, 120, 800, 2500],
    'location_unknown': [0, 0, 0, 1, 0, 1, 0, 0, 1, 1],
    'time_delta': [300, 600, 1200, 5, 1800, 15, 400, 900, 60, 10],
    'is_fraud': [0, 0, 0, 1, 0, 1, 0, 0, 0, 1]
})
X = data.drop('is_fraud', axis=1)
y = data['is_fraud']

# Normalize features
scaler = StandardScaler()
X_scaled = scaler.fit_transform(X)

# Train the model
model = RandomForestClassifier(n_estimators=100, random_state=42)
model.fit(X_scaled, y)

# Save model and scaler
with open('fraud_model.pkl', 'wb') as f:
    pickle.dump(model, f)
with open('scaler.pkl', 'wb') as f:
    pickle.dump(scaler, f)

def load_model():
    with open('fraud_model.pkl', 'rb') as f:
        return pickle.load(f)

def load_scaler():
    with open('scaler.pkl', 'rb') as f:
        return pickle.load(f)

model = load_model()
scaler = load_scaler()

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json()
    amount = float(data['amount'])
    location_unknown = 1 if 'Unknown' in data['location'] else 0
    time_delta = float(data['time_delta'])

    # Scale input features
    features = scaler.transform([[amount, location_unknown, time_delta]])
    fraud_prob = model.predict_proba(features)[0][1] * 100

    # Adjusted rules: less aggressive
    is_fraud = (fraud_prob > 85) or (amount > 2000 and time_delta < 60)
    return jsonify({
        'risk_score': round(fraud_prob, 2),
        'is_fraud': is_fraud,
        'details': {
            'probability': round(fraud_prob, 2),
            'amount_trigger': amount > 2000,
            'interval_trigger': time_delta < 60
        }
    })

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)