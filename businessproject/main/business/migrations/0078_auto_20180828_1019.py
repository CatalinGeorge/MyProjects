# Generated by Django 2.1 on 2018-08-28 10:19

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('business', '0077_chat_sender_profile'),
    ]

    operations = [
        migrations.AlterField(
            model_name='chat',
            name='date',
            field=models.DateTimeField(auto_now=True),
        ),
    ]
